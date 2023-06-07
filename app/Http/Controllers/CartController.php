<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreatedMail;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $cart = $this->cartService;

        return view('pages.cart', compact('cart'));
    }

    public function remove(Product $product): RedirectResponse
    {
        if ($this->cartService->remove($product)) {
            session()->flash('message', 'Продукт был удален');
            return back();
        }

        session()->flash('message', 'Продукт не удален');
        return back();
    }

    public function checkoutIndex(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $cart = $this->cartService;

        return view('pages.order', compact('cart'));
    }

    public function createOrder(): RedirectResponse
    {
        if ($this->cartService->isEmpty()) {
            return back()->withErrors(['empty', 'Корзина пуста']);
        }
        $order = Order::query()->create([
            'user_id' => auth()->user()->getAuthIdentifier(), //->id
            'total' => $this->cartService->getTotal()
        ]);

        foreach ($this->cartService->get() as $item) {
            OrderProduct::query()->create([
                'order_id' => $order->id,
                'product_id' => $item->id
            ]);
        }

        Mail::to(auth()->user()->email)->send(new OrderCreatedMail($order));

        return redirect()->route('page.home')->with('message' . 'Заказ создан!');
    }

    public function checkout(Request $request): JsonResponse
    {
        if (!Hash::check($request->get('password'), auth()->user()->getAuthPassword())) {
            return response()->json([
                'message' => 'Введенный пароль недействителен для вашего аккаунта',
                'status' => false
            ]);
        }

        if ($this->cartService->isEmpty()) {
            return response()->json([
                'empty' => 'Вы ничего не добавили в корзину',
                'status' => false
            ]);
        }

        $order = Order::query()->create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'total' => $this->cartService->getTotal(),
        ]);

        foreach ($this->cartService->get() as $item) {
            OrderProduct::query()->create([
                'order_id' => $order->id,
                'product_id' => $item->id
            ]);
        }


        $this->cartService->clear();

//        $user = auth()->user();

        Mail::to(auth()->user()->email)->send(new OrderCreatedMail($order));
//        Mail::to($user->email)->send(new OrderCreatedMail($order));

        return response()->json([
            'message', 'Заказ оформлен!',
            'status' => true,
            'redirect_url' => route('page.home')
        ]);

    }

    public function clear(): RedirectResponse
    {
        $this->cartService->clear();
        return back();
    }

}
