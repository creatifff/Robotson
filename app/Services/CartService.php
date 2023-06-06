<?php

namespace App\Services;

use App\Interfaces\CartInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Throwable;


class CartService implements CartInterface
{
    /**
     * @return string
     */
    public function getTotal(): string
    {
        $total = array_reduce($this->get(), fn($total, $item) => $total += $item->price, 0);
        return number_format($total, 0, ',', ' ') . ' ₽';
    }

    /**
     * @return mixed
     */
    public function get(): mixed
    {
        try {
            if (session()->has('cart')) {
                return session()->get('cart');
            }

            return [];
        } catch (Throwable $throwable) {
            Log::error($throwable->getMessage());
            return [];
        }

    }

    /**
     * @return void
     */
    public function clear(): void
    {
//       session('cart', []);
//       session()->invalidate();

        session()->pull('cart', []);

    }

    /**
     * @param Product $product
     * @return void
     */
    public function add(Product $product): void
    {
        session()->push('cart', $product);
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function remove(Product $product): bool
    {
        $cartItems = $this->get();

        foreach ($cartItems as $key => $item) {
            if ($item->id === $product->id) {
                unset($cartItems[$key]);
                $this->set($cartItems);
                $product = null;
                return true;
            }
        }

        return false;
    }

    private function set(array $items): void
    {
        session(['cart' => $items]);
    }

    /**
     * @param Product $product
     * @return void
     */
    public function update(Product $product): void
    {
        // TODO: Implement update() method.
    }


    public function isEmpty(): bool
    {
        if (count($this->get()) > 0) return false;

        return true;
    }

    public function count(): int
    {
        $cart = session('cart', []);
        return count($cart);
    }
}
