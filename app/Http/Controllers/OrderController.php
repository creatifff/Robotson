<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function changeStatus(Request $request, Order $order): RedirectResponse
    {
        $order->update([
            'status' => $request->get('status')
        ]);

        return back()->with(['message' => "Статус заказа №$order->id изменен."]);
    }

    public function deleteOrder($id): RedirectResponse
    {
        $order = Order::where('id', $id)->firstOrFail();
        $order->delete();

        return redirect()
            ->route('admin.showOrders')
            ->with(['message' => "Заказ №$order->id отменен."]);
    }
}
