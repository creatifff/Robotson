@extends('layout.admin')

@section('title', 'Добавить категорию')

@section('content')
    <h3 class="profile__action-title">Добавление новой категории</h3>
    <form
        action="{{ route('admin.collection.createCollection') }}"
        class="form gray-bg"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="form__input-column">
            <label for="name">Название</label>
            <input class="form__input is-invalid" type="text" name="name" id="name">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form__input-row">
            <div class="form__input-column file-input-hidden">
                <label for="image_path">
                    <input
                        class="is-invalid"
                        type="file"
                        id="image_path"
                        name="image_path"
                    >
                    <span>Добавьте картинку категории</span>
                </label>

                @error('image_path')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="form__btn" type="submit">Добавить</button>
        </div>
    </form>
@endsection
