<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderCreatedMail;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    public function store(Request $request): JsonResponse
    {
        if (!Hash::check($request->get('password'), auth()->user()->getAuthPassword())) {
            return response()->json([
                'message' => 'Введенный пароль недействителен',
                'status' => false,
            ]);
        }

        if ($this->cartService->isEmpty()) {
            return response()->json([
                'empty' => 'Вы ничего не добавили в корзину',
                'status' => false
            ]);
        }

        $order = Order::query()->create([
            'user_id' => auth()->user()->id,
            'total' => $this->cartService->getTotal(),
        ]);

        foreach ($this->cartService->get() as $item) {
            OrderProduct::query()->create([
                'order_id' => $order->id,
                'product_id' => $item->id
            ]);
        }

        $this->cartService->clear();

        Mail::to(auth()->user()->email)->send(new OrderCreatedMail($order));
        return response()->json([
            'message', 'Заказ оформлен!',
            'status' => true,
        ]);
    }

    public function updateStatus(Request $request, $orderId): RedirectResponse
    {
        $order = Order::findOrFail($orderId);
        $order->status = $request->input('orderStatus');
        $order->save();

        return back()->with('success', 'Статус заказа обновлен');
    }

//    public function deleteOrderProduct($orderId, $productId): RedirectResponse
//    {
//        try {
//            $order = Order::findOrFail($orderId);
//            $orderProduct = $order->products()->where('id', $productId)->first();
//
//            if ($orderProduct) {
//                $productName = $orderProduct->product->name;
//
//                // Удаляем товар из заказа
//                $orderProduct->delete();
//
//                // Проверяем, остались ли ещё товары в заказе
//                if ($order->products->isEmpty()) {
//                    // Удаляем заказ, если нет других товаров
//                    $order->delete();
//                    return back()->with('success', 'Товар "' . $productName . '" успешно удален из заказа, и заказ удален соответственно');
//                } else {
//                    return back()->with('success', 'Товар "' . $productName . '" успешно удален из заказа!');
//                }
//            } else {
//                return back()->with('failure', 'Товар не найден в заказе.');
//            }
//        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
//            return back()->with('failure', 'Заказ или товар не найдены.');
//        }
//    }
}
