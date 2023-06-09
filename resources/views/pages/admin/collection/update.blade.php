@extends('layout.admin')

@section('title', 'Редактирование категории')

@section('content')
    <h3 class="profile__action-title">Редактирование: {{ $collection->name }}</h3>
    <form
        action="{{ route('admin.collection.updateCollection', $collection) }}"
        class="form gray-bg"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')
        <div class="form__input-column">
            <label for="name">Название</label>
            <input
                class="form__input is-invalid"
                type="text"
                name="name"
                id="name"
                value="{{ $collection->name }}"
            >
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-row-block">
            <div class="form__input-column file-input-hidden">
                <label for="image_path">
                    <input
                        class="is-invalid"
                        type="file"
                        id="image_path"
                        name="image_path"
                    >
                    <span>Изменить картинку категории</span>
                </label>
                @error('image_path')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="form__btn" type="submit">Сохранить</button>
        </div>
        <div class="form__img-block">
            <img src="{{ $collection->image() }}" alt="{{ $collection->name }}" class="category-img">
        </div>
    </form>
    <form class="delete-product-form" action="{{ route('admin.collection.deleteCollection', $collection->id) }}"
          method="post">
        @csrf
        @method('DELETE')
        <button class="admin-delete-btn" type="submit">Удалить категорию</button>
    </form>
@endsection
