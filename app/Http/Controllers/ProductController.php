<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(CreateRequest $request)
    {
        $validated = $request->validated();
        $validated['is_published'] = (bool)$request->get('is_published');
        $product = Product::query()->create($validated);

        if($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $image) {
                $path = $image->store('public/images');
                $product->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.admin')->with(['message' => "Товар \"$product->name\" успешно добавлен!"]);
    }
}
