<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Models\Collection;
use App\Models\Order;
use App\Models\Product;
use App\Models\Request;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.admin.index');
    }

    public function personalData(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.admin.personalData');
    }

//    public function changePassword()
//    {
//        return view('pages.admin.changePassword');
//    }

//    public function updatePassword(UpdatePasswordRequest $request, User $user)
//    {
//        $validated = $request->validated();
//            $validated['password'] = Hash::make($validated['password']);
//        $user = auth()->user();
//        $user->save();
//        $user->update($validated);
//        return redirect()
//            ->route('admin.changePassword')
//            ->with(['message' => 'Пароль обновлен!']);
//    }

    public function updateData(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('public/images');
        }

        $user = auth()->user();
        $user->save();
        $user->update($validated);

        return redirect()
            ->route('admin.personalData')
            ->with(['message' => 'Данные обновлены!']);
    }

    public function showUsers(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $users = User::all();
        return view('pages.admin.users', compact('users'));
    }

    public function showProducts(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $products = Product::all();
        return view('pages.admin.products', compact('products'));
    }

    public function showRequests(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $requests = Request::all();
        return view('pages.admin.requests', compact('requests'));
    }

    public function createProduct(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $collections = Collection::all();

        return view('pages.admin.product.create', compact('collections'));
    }

    public function createCollection(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.admin.collection.create');
    }


    public function allOrders(\Illuminate\Http\Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $orders = Order::paginate(5);
        $products = Product::all();
        $orderStatuses = ['В обработке','Принят','Отменен','Отправлен','Завершен'];


        return view('pages.admin.orders', compact('orders', 'products', 'orderStatuses'));
    }
}
