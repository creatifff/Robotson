<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\CartService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }


    // Создать продукт
    public function createProduct(CreateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['is_published'] = (bool)$request->get('is_published');

        $product = Product::query()->create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                ProductImage::query()->create([
                    'product_id' => $product->id,
                    'image_path' => $file->store('public/images')
                ]);
            }
        } else {
            ProductImage::query()->create([
                'product_id' => $product->id,
            ]);
        }

        return redirect()
            ->route('admin.showProducts')
            ->with(['message' => "Продукт \"$product->name\" добавлен."]);
    }


    // Редактировать продукт
    public function updateProduct(UpdateRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();
        $validated['is_published'] = (bool)$request->get('is_published');

        if ($request->hasFile('images')) {
            $productImages = [];
            foreach ($request->file('images') as $file) {
                $productImages[] = [
                    'product_id' => $product->id,
                    'image_path' => $file->store('public/images')
                ];
            }
            ProductImage::query()->insert($productImages);
        }

        if ($request->has('deleted_images')) {
            $deletedImages = $request->input('deleted_images');
            ProductImage::whereIn('id', $deletedImages)->delete();
        }

        $product->update($validated);

        return redirect()
            ->back()
            ->with(['message' => "Продукт \"$product->name\" обновлен."]);
    }


    // Удалить продукт
    public function deleteProduct($id): RedirectResponse
    {
        $product = Product::where('id', $id)->firstOrFail();
        $product->delete();

        return redirect()
            ->route('admin.showProducts')
            ->with(['message' => "Продукт \"$product->name\" удален."]);
    }


    // Страница одного продукта
    public function show(Product $product, Request $request): \Illuminate\Foundation\Application|View|Factory|Application
    {

//        $collectionId = $product->collection_id;
//        $collection = Collection::findOrFail($collectionId);

        $collections = Collection::all();
        $products = Product::query()->where('is_published', '=', true)->inRandomOrder()->take(10)->get();

        if ($request->has('collection')) {
            $products = $products->where('collection_id', '=', $request->get('collection'));
        }

        return view('pages.single', compact('product', 'products', 'collections'));
    }


    // Добавить в корзину
    public function addToCart(string $id): RedirectResponse
    {
        /** @var Product $product */
        $product = Product::query()->find($id);

        if (is_null($product)) {
            return back();
        }

        $this->cartService->add($product);
        return back()->with(['message' => "Продукт добавлен в корзину!"]);
    }
}
