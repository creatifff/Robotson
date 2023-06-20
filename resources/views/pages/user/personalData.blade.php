@extends('layout.user')

@section('title', 'Личные данные')

@section('content')
{{--    <h3 class="profile__action-title">Редактирование данных</h3>--}}
    <form class="form form-personal-data" action="{{ route('account.updateData') }}" enctype="multipart/form-data"
          method="post">
        @csrf
        <div class="form-image-block">
            <img src="{{ auth()->user()->imageUrl() }}" alt="{{ auth()->user()->name }}" class="personal__photo">
            <div class="form__input-column">
                <p>{{ auth()->user()->getFullNameAttribute() }}</p>
                <label for="image_path">
                <input class="is-invalid" type="file" name="image_path" id="image_path">
                <span>Редактировать фото профиля</span>
                </label>
                @error('image_path')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <hr>
        <div class="form-personal__flex">
            <div class="form-personal__block">
                <div class="form__input-column">
                    <label for="name">Имя</label>
                    <input type="text" class="form__input is-invalid" id="name" value="{{ auth()->user()->name }}"
                           name="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__input-column">
                    <label for="surname">Фамилия</label>
                    <input type="text" class="form__input is-invalid" id="surname" value="{{ auth()->user()->surname }}"
                           name="surname">
                    @error('surname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__input-column">
                    <label for="middle_name">Отчество</label>
                    <input type="text" class="form__input is-invalid" id="middle_name"
                           value="{{ auth()->user()->middle_name }}"
                           name="middle_name">
                    @error('middle_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-personal__block">
                <div class="form__input-column">
                    <label for="city">Город</label>
                    <input type="text" class="form__input is-invalid" id="city" value="{{ auth()->user()->city }}"
                           name="city">
                    @error('city')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__input-column">
                    <label for="phone_number">Номер телефона</label>
                    <input disabled type="text" class="form__input is-invalid" id="phone_number"
                           value="{{ auth()->user()->phone_number }}"
                           name="phone_number">
                    @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__input-column">
                    <label for="email">E-mail</label>
                    <input disabled type="text" class="form__input is-invalid" id="email" value="{{ auth()->user()->email }}"
                           name="email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="form__btn" type="submit">Обновить</button>
    </form>
@endsection
