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

        return back();
    }
}
