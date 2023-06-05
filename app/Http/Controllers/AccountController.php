<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view('pages.user.index');
    }

    public function personalData()
    {
        return view('pages.user.personalData');
    }

    public function changePassword()
    {
        return view('pages.user.changePassword');
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user)
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

    public function updateData(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if ($request->hasFile('image_path'))
        {
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
