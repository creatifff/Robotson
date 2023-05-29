<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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

        return redirect()->route('admin.admin')->with(['message' => "Товар \"$product->name\" успешно добавлен!"]);
    }
}
