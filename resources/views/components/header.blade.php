<nav class="header-nav__menu">
    <div class="container__main cont__header">
        <div class="header-nav__menu--inner">
            <div class="nav__menu-section">
                <a href="/" class="header__nav-btn__name">Главная</a>
                <a href="{{ route('page.catalog') }}" class="header__nav-btn__name">Каталог</a>
                <a href="#services" class="header__nav-btn__name">Услуги</a>
                <a href="#contacts" class="header__nav-btn__name">Контакты</a>
                <a href="#benefits" class="header__nav-btn__name">О компании</a>
            </div>
            <div class="nav__menu-section">
                <a target="_blank" href="https://t.me/nazyrovrr">
                    <div class="nav__menu-section-btn">
                        <span>telegram</span>
                        <i class="fa-brands fa-telegram"></i>
                    </div>
                </a>
                <a href="tel:89274156060">
                    <div class="nav__menu-section-btn">
                        <span>+7 927 415 60-60</span>
                        <i class="fa-solid fa-phone"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</nav>
<header class="header">
    <div class="container__main cont__header">
        <div class="header__inner">
            <a href="/">
                <div class="logo">
                    <h1>Robotson</h1>
                </div>
            </a>
            <nav class="header__nav">
                @guest
                    <div class="dropdown">
                        <button class="header__nav-btn" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-door-open"></i>
                            <span class="header__nav-btn__name">Вход</span>
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('page.login') }}">Войти</a></li>
                            <li><a class="dropdown-item" href="{{ route('page.register') }}">Регистрация</a></li>
                        </ul>
                    </div>
                @endguest
                @auth
                    @if(auth()->user()->role === 'user')
                        <div class="dropdown">
                            <button class="header__nav-btn" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown">
                                <img class="user-img" src="{{ auth()->user()->imageUrl() }}" alt="user-img">
                                <span class="header__nav-btn__name">Кабинет</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Главная</a></li>
                                <li><a class="dropdown-item" href="#">Личные данные</a></li>
                                <li><a class="dropdown-item" href="#">Мои заказы</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('auth.logoutUser') }}">Выйти</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="dropdown">
                            <button class="header__nav-btn" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown">
                                <img class="user-img" src="{{ auth()->user()->imageUrl() }}" alt="user-img">
                                <span class="header__nav-btn__name">Админ панель</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('admin.index') }}">Главная</a></li>
                                <li><a class="dropdown-item" href="#">Мои данные</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.showProducts') }}">Все продукты</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.showUsers') }}">Все пользователи</a></li>
                                <li><a class="dropdown-item" href="#">Заказы</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('auth.logoutUser') }}">Выйти</a></li>
                            </ul>
                        </div>
                    @endif
                @endauth

                <a href="#">
                    <div class="header__nav-btn">
                        <i class="fa-solid fa-heart"></i>
                        <p class="header__nav-btn__name">Избранное</p>
                    </div>
                </a>
                <a href="#">
                    <div class="header__nav-btn">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p class="header__nav-btn__name">Корзина</p>
                    </div>
                </a>
            </nav>
        </div>
    </div>
</header>
