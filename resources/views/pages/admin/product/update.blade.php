@extends('layout.admin')

@section('title', 'Редактирование')

@section('content')
    <h3 class="profile__action-title">{{ $product->name }}</h3>
    <form
        action="{{ route('admin.product.updateProduct', $product) }}"
        class="form gray-bg form-flex-row"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')
        <div class="form__block">
            <div class="form__input-column">
                <label for="name">Название</label>
                <input value="{{ $product->name }}" class="form__input is-invalid" type="text" name="name" id="name">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form__input-column">
                <label for="price">Стоимость</label>
                <input value="{{ $product->price }}" class="form__input is-invalid" type="text" name="price" id="price">
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form__input-column">
                <label for="quantity">Кол-во</label>
                <input value="{{ $product->quantity }}" class="form__input is-invalid" min="0" type="number" name="quantity" id="quantity">
                @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form__input-column">
                <label for="collection">Выберите категорию продукта</label>
                <select class="form__input" id="collection" name="collection_id">
                    @foreach($collections as $collection)
                        <option
                            value="{{ $collection->id }}"
                            @if($collection->id === $product->collection_id) selected @endif
                        >
                            {{ $collection->name }}
                            - {{ $collection->products()->count() }} шт.
                        </option>
                    @endforeach
                </select>
                @error('collection_id')
                <div class="invalid-feedback-select">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form__block">
            <div class="form__input-column">
                <label for="text">Полное описание</label>
                <textarea rows="4" class="form__textarea is-invalid" name="text" id="text">
                    {{ $product->text }}
                </textarea>
                @error('text')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form__input-column">
                <label for="image_path">Изменить фото продукта</label>
                <input
                    class="is-invalid"
                    type="file"
                    id="image_path"
                    name="images[]"
                    accept="image/*"
                    multiple
                >
                @error('image_path')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form__input-column">
                <label>
                    <input
                        type="checkbox"
                        {{ $product->is_published ? 'checked' : '' }}
                        name="is_published"
                    >
                    Опубликовать продукт?
                </label>
            </div>
        </div>
        @if($product->images->count() > 0)
            <div>
                <span>Фотографии продукта:</span>
                <div class="gallery">
                    @foreach($product->images()->get() as $image)
                        <div class="image">
                            <img
                                src="{{ $image->path() }}"
                                alt="{{ $product->name }}"
                                style="width: 100px; height: 100px; object-fit: contain"
                            >
                            <input
                                type="checkbox"
                                name="deleted_images[]"
                                value="{{ $image->id }}"
                                id="delete_{{ $image->id }}"
                            >
                            <label for="delete_{{ $image->id }}" class="update-image-label">
                                Удалить
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <button class="form__btn" type="submit">Изменить</button>
    </form>
    <form action="{{ route('admin.product.deleteProduct', $product->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить продукт</button>
    </form>
@endsection
