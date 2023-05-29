@extends('layout.admin')

@section('title', 'Добавить продукт')

@section('content')
    <h3 class="profile__action-title">Добавление новой категории</h3>
    <form
        action="{{ route('admin.collection.createCollection') }}"
        class="form gray-bg form-flex-row"
        method="post"
    >
        @csrf
            <div class="form__input-column">
                <label for="name">Название категории</label>
                <input class="form__input is-invalid" type="text" name="name" id="name">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="form__btn" type="submit">Добавить</button>
    </form>
@endsection
