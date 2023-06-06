@extends('layout.layout')

@section('title', 'Регистрация')

@section('content')
    <section>
        <div class="page-header-bg">
            <div class="container__main">
                <h1 class="section__title black">Регистрация</h1>
            </div>
        </div>
        <div class="container__main">
            <div class="register-content">
                <form class="form" action="{{ route('auth.createUser') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form__input-column">
                        <label for="name">Имя *</label>
                        <input type="text" class="form__input is-invalid" id="name" value="{{ old('name') }}"
                               name="name">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form__input-column">
                        <label for="surname">Фамилия *</label>
                        <input type="text" class="form__input is-invalid" id="surname" value="{{ old('surname') }}"
                               name="surname">
                        @error('surname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form__input-column">
                        <label for="phone_number">Номер телефона *</label>
                        <input type="text" class="form__input is-invalid" id="phone_number"
                               value="{{ old('phone_number') }}" name="phone_number">
                        @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form__input-column">
                        <label for="email">Адрес электронной почты *</label>
                        <input type="text" class="form__input is-invalid" id="email" value="{{ old('email') }}"
                               name="email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form__input-column">
                        <label for="password">Придумайте пароль *</label>
                        <input type="password" class="form__input is-invalid" id="password" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form__input-column">
                        <label for="re_password">Повторите пароль *</label>
                        <input type="password" class="form__input is-invalid" id="re_password" name="re_password">
                    </div>

                    <label>
                        <input class=" @error('rules') is-invalid @enderror" type="checkbox" name="rules">
                        Я принимаю правила регистрации и даю согласие на обработку своих данных
                        @error('rules')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </label>

                    <button class="form__btn form-auth__btn" type="submit">Регистрация</button>
                    <div class="auth-offer">
                        <p>Уже зарегистрированы?</p>
                        <a href="{{ route('page.login') }}">Войдите в аккаунт</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
