<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.user.index');
    }

    public function personalData(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.user.personalData');
    }

    public function orders(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $authUserId = auth()->user()->id;
        $orders = Order::query()->where('user_id', '=', $authUserId)->paginate(5);

        return view('pages.user.orders', compact('orders'));
    }

    public function changePassword(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.user.changePassword');
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = auth()->user();
        $user->save();
        $user->update($validated);

        return redirect()
            ->route('account.changePassword')
            ->with(['message' => 'Пароль обновлен!']);
    }

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
            ->route('account.personalData')
            ->with(['message' => 'Данные обновлены!']);
    }
}
