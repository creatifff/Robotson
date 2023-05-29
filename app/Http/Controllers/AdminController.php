<?php

namespace App\Http\Controllers;

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
