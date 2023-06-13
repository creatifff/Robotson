<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createUser(CreateUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::query()->create($validated);
        /** @var User $user */
        auth()->login($user);
//        return response()->json([
//            'status' => true,
//            'message' => 'Успешно зарегистрировались',
//            'redirect_url' => route('page.home')
//        ]);
        return redirect()->route('page.home');
    }

    public function loginUser(LoginUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if (auth()->attempt($validated)) {
            return redirect()->route('page.home');
        }

        return back()->withErrors(['invalid' => 'Неверный логин или пароль']);
    }

    public function logoutUser(): RedirectResponse
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerate();
        return redirect()->route('page.home');
    }
}
