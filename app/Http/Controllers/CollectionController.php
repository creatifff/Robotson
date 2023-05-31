<?php

namespace App\Http\Controllers;

use App\Http\Requests\Collection\CreateCollectionRequest;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function createCollection(CreateCollectionRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('public/images');
        }

        $collection = Collection::query()->create($validated);

        return redirect()->route('admin.index')->with(['message' => "Категория \"$collection->name\" добавлена!"]);
    }
}
