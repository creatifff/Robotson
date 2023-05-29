<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('pages.admin.admin');
    }

    public function createProduct()
    {
        $collections = Collection::all();

        return view('pages.admin.product.create', compact('collections'));
    }
}
