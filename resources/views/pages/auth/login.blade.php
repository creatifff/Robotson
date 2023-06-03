@extends('layout.layout')

@section('title', 'Вход')

@section('content')
    <section>
        <div class="page-header-bg">
            <div class="container__main">
                <h1 class="section__title black">Вход</h1>
            </div>
        </div>
        <div class="container__main">
            <div class="register-content">
                <form class="form" action="{{ route('auth.loginUser') }}" method="post">
                    @csrf
                    <div class="form__input-column">
                        <label for="email">Введите e-mail</label>
                        <input type="text" class="form__input is-invalid" id="email" value="{{ old('email') }}"
                               name="email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form__input-column">
                        <label for="password">Введите пароль</label>
                        <input type="password" class="form__input is-invalid" id="password" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @error('invalid')
                    <div class="error">
                        {{ $message }}
                    </div>
                    @enderror
                    <button class="form__btn form-auth__btn" type="submit">Войти</button>
                    <div class="auth-offer">
                        <p>Нет аккаунта?</p>
                        <a href="{{ route('page.register') }}">Зарегистрируйтесь</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
