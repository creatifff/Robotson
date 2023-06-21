<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('meta-description')">
    <meta name="theme-color" content="#0e0e0e"/>
    <link type="image/x-icon" href="favicon.ico" rel="shortcut icon">
    <link type="Image/x-icon" href="favicon.ico" rel="icon">
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap') }}"
          rel="stylesheet">
    <link
        rel="stylesheet"
        href="{{ asset('https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css') }}"
    />

    <script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js') }}" defer></script>
    <link rel="stylesheet"
          href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    {{--    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">--}}
    {{--    <script src="{{ asset('public/js/app.js') }}" defer></script>--}}
    <title>@yield('title') - Кабинет</title>
</head>
<body>
@include('components.header')
@if(session()->has('message'))
    <div class="container__main">
        <div class="alert alert-info">
            <p>{{ session()->get('message') }}</p>
        </div>
    </div>
@endif
<section>
    <div class="admin-page-header-bg">
        <div class="container__main">
            <h1 class="section__title black">Личный кабинет</h1>
        </div>
    </div>
    <div class="container__main">
        <div class="profile__grid">
            <div class="profile__menu">
                <a href="{{ route('account.index') }}" class="profile__menu-btn">Главная</a>
                <a href="{{ route('account.personalData') }}" class="profile__menu-btn">Мои данные</a>
                <a href="{{ route('account.orders') }}" class="profile__menu-btn">Мои заказы</a>
                <a href="{{ route('account.changePassword') }}" class="profile__menu-btn">Смена пароля</a>
                <hr>
                <a href="{{ route('auth.logoutUser') }}" class="profile__menu-btn">Выйти</a>
            </div>
            <div class="profile__action">
                @yield('content')
            </div>
        </div>
    </div>
</section>
@include('components.footer')
</body>
</html>
