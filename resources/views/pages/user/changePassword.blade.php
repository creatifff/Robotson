@extends('layout.user')

@section('title', 'Сменить пароль')

@section('content')
    {{--    <h3 class="profile__action-title">Редактирование данных</h3>--}}
    <form class="form form-personal-data" action="{{ route('account.updatePassword') }}" method="post">
        @csrf
        <div class="form__input-column">
            <label for="password">Новый пароль</label>
            <input type="password" class="form__input is-invalid" id="password" name="password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form__input-column">
            <label for="re_password">Подтвердите пароль</label>
            <input type="password" class="form__input is-invalid" id="re_password" name="re_password">
        </div>
        <button class="form__btn" type="submit">Обновить</button>
    </form>
@endsection
