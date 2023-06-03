@extends('layout.admin')

@section('title', 'Добавить продукт')

@section('content')
    <h3 class="profile__action-title">Добавление нового продукта</h3>
    <form
        action="{{ route('admin.product.createProduct') }}"
        class="form gray-bg form-flex-row"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="form__block">
            <div class="form__input-column">
                <label for="name">Название</label>
                <input class="form__input is-invalid" type="text" name="name" id="name">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form__input-column">
                <label for="price">Стоимость</label>
                <input class="form__input is-invalid" type="text" name="price" id="price">
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form__input-column">
                <label for="quantity">Кол-во штук</label>
                <input class="form__input is-invalid" min="1" type="number" name="quantity" id="quantity">
                @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form__input-column">
                <label for="collection">Выберите категорию продукта</label>
                <select class="form__input" id="collection" name="collection_id">
                    <option disabled selected>...</option>
                    @foreach($collections as $collection)
                        <option value="{{ $collection->id }}">{{ $collection->name }}
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
                <textarea rows="4" class="form__textarea is-invalid" name="text" id="text"></textarea>
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
        </div>
    </form>
@endsection
