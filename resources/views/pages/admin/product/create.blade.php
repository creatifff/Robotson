@extends('layout.layout')

@section('title', 'Добавить продукт')

@section('content')
    <section class="section">
        <div class="container__main">
            <h1 class="section__title white">Добавление</h1>
            <form
                action="{{ route('product.createProduct') }}"
                class="form"
                method="post"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="form__input-column">
                    <label for="name">Название продукта</label>
                    <input class="form__input is-invalid" type="text" name="name" id="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__input-column">
                    <label for="price">Цена</label>
                    <input class="form__input is-invalid" type="text" name="price" id="price">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__input-column">
                    <label for="quantity">Кол-во продуктов</label>
                    <input class="form__input is-invalid" min="1" type="number" name="quantity" id="quantity">
                    @error('quantity')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__input-column">
                    <label for="collection">Выберите категорию продукта</label>
                    <select class="is-invalid" id="collection" name="collection_id">
                        @foreach($collections as $collection)
                            <option value="{{ $collection->id }}">{{ $collection->name }} - {{ $collection->products()->count() }} шт.</option>
                        @endforeach
                    </select>
                    @error('collection_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__input-column">
                    <label for="text">Полное описание</label>
                    <textarea class="form__textarea is-invalid" name="text" id="text"></textarea>
                    @error('text')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__input-column">
                    <label for="image_path">Добавьте несколько фото к продукту</label>
                    <input class="is-invalid" type="file" id="image_path" name="images[]" multiple>
                    @error('image_path')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__input-column">
                    <label>
                        <input type="checkbox" checked name="is_published">
                        Опубликовать продукт?
                    </label>
                </div>
                <button class="form__btn" type="submit">Добавить</button>
            </form>
        </div>
    </section>
@endsection
