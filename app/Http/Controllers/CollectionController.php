<?php

namespace App\Http\Controllers;

use App\Http\Requests\Collection\CreateCollectionRequest;
use App\Http\Requests\Collection\UpdateCollectionRequest;
use App\Models\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    // Добавить категорию
    public function createCollection(CreateCollectionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('public/images');
        }

        $collection = Collection::query()->create($validated);

        return redirect()->route('admin.index')->with(['message' => "Категория \"$collection->name\" добавлена."]);
    }

    // Редактировать категорию
    public function updateCollection(UpdateCollectionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('public/images');
        }

        $collection = Collection::query()->update($validated);

        return redirect()
            ->route('admin.index')
            ->with(['message' => "Категория \"$collection->name\" обновлена."]);
    }

    // Удаление категории
    public function deleteCollection(Collection $collection): RedirectResponse
    {
        $collection = Collection::query()->delete();

        return redirect()
            ->route('admin.index')
            ->with(['message' => "Категория \"$collection->name\" удалена."]);
    }

}
