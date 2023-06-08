@extends('layout.admin')

@section('title', 'Редактирование категории')

@section('content')
    <h3 class="profile__action-title">{{ $collection->name }}</h3>
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
        <div class="form__input-row">
            <div class="form__input-column">
                <label for="image_path">Изменить картинку категории</label>
                <input
                    class="is-invalid"
                    type="file"
                    id="image_path"
                    name="image_path"
                >
                @error('image_path')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-image-block">
                <span>Картинка категории:</span>
                <img src="{{ $collection->image() }}" alt="{{ $collection->name }}" class="personal__photo">
            </div>
            <button class="form__btn" type="submit">Изменить</button>
        </div>
    </form>
    <form action="{{ route('admin.collection.deleteCollection', $collection->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить категорию</button>
    </form>
@endsection
