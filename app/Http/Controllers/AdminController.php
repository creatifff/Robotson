<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.index');
    }

    public function createProduct()
    {
        $collections = Collection::all();

        return view('pages.admin.product.create', compact('collections'));
    }
}
