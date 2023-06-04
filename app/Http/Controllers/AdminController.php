<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UpdateUserRequest;
use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.index');
    }

    public function personalData()
    {
        return view('pages.admin.personalData');
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
            ->route('admin.personalData')
            ->with(['message' => 'Данные обновлены!']);
    }

    public function showUsers()
    {
        $users = User::all();
        return view('pages.admin.users', compact('users'));
    }

    public function showProducts()
    {
        $products = Product::all();
        return view('pages.admin.products', compact('products'));
    }

    public function createProduct()
    {
        $collections = Collection::all();

        return view('pages.admin.product.create', compact('collections'));
    }

    public function createCollection()
    {
        return view('pages.admin.collection.create');
    }
}
