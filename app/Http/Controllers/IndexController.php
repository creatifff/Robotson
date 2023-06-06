<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $collections = Collection::all();

        $products = Product::query()->where('is_published', '=', true)->inRandomOrder()->take(10)->get();

        if ($request->has('collection')) {
            $products = $products->where('collection_id', '=', $request->get('collection'));
        }

        //  $products = $products->paginate(10)->withQueryString();

        return view('pages.home', compact('products', 'collections'));
    }

    public function register(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.auth.register');
    }

    public function login(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.auth.login');
    }

    public function catalog(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $collections = Collection::all();

        $products = Product::query()->where('is_published', '=', true);

        if ($request->has('collection')) {
            $products = $products->where('collection_id', '=', $request->get('collection'));
        }

        $products = $products->paginate(8)->withQueryString();

        return view('pages.catalog', compact('products', 'collections'));
    }
}
