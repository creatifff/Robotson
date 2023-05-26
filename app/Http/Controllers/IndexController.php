<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function register() {
        return view('pages.auth.register');
    }

    public function login() {
        return view('pages.auth.login');
    }

    public function catalog(Request $request)
    {
        $collections = Collection::all();

        $products = Product::query()->where('is_published', '=', true);

        if($request->has('collection')) {
            $products = $products->where('collection_id', '=', $request->get('collection'));
        }

        $products = $products->paginate(30)->withQueryString();

        return view('pages.catalog', compact('products', 'collections'));
    }
}
