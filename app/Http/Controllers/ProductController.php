<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function createProduct(CreateRequest $request)
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
        }

        return redirect()
            ->route('admin.showProducts')
            ->with(['message' => "Продукт \"$product->name\" успешно добавлен!"]);
    }

    /**
     * @param UpdateRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function updateProduct(UpdateRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->update($validated);

        return redirect()
            ->route('product.show', $product)
            ->with(['message' => 'Продукт был изменен!']);
    }

    /**
     * @param Product $product
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(Product $product, Request $request)
    {
//        $collectionId = $product->collection_id;
//        $collection = Collection::findOrFail($collectionId);

        $collections = Collection::all();

        $products = Product::query()->where('is_published', '=', true)->inRandomOrder()->take(10)->get();

        if($request->has('collection')) {
            $products = $products->where('collection_id', '=', $request->get('collection'));
        }

        return view('pages.single', compact('product', 'products', 'collections'));
    }
}
