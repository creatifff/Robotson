<?php

namespace App\Http\Controllers;

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

//    public function showUsers(): View|\Illuminate\Foundation\Application|Factory|Application
//    {
//        $users = User::all();
//        return view('pages.admin.users', compact('users'));
//    }

    public function showProducts(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $collections = Collection::all();

        $products = Product::query();

        $products = $products->paginate(9)->withQueryString();

        return view('pages.admin.products', compact('products', 'collections'));
    }

    public function showRequests(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $requests = Request::all();
        return view('pages.admin.requests', compact('requests'));
    }

    // Страница с добавлением продукта
    public function createProduct(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $collections = Collection::all();

        return view('pages.admin.product.create', compact('collections'));
    }

    // Страница с редактированием и удалением продукта
    public function updateProduct(Product $product): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $collectionId = $product->collection_id;

        $collections = Collection::all();

        return view('pages.admin.product.update', compact('product', 'collections', 'collectionId'));
    }


    public function createCollection(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.admin.collection.create');
    }

    public function showCollections(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $collection = Collection::paginate(10);

        return view('pages.admin.collection.collection', compact('collection'));
    }


    public function showOrders(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $orders = Order::paginate(5);
        $products = Product::all();
        $orderStatuses = ['В обработке', 'Принят', 'Отменен', 'Отправлен', 'Завершен'];


        return view('pages.admin.orders', compact('orders', 'products', 'orderStatuses'));
    }
}
