<nav class="header-nav__menu">
    <div class="container__main cont__header">
        <div class="header-nav__menu--inner">
            <div class="nav__menu-section">
                <a href="/" class="header__nav-btn__name">Главная</a>
                <a href="{{ route('page.catalog') }}" class="header__nav-btn__name">Каталог</a>
                <a href="{{ asset('/#services') }}" class="header__nav-btn__name">Услуги</a>
                <a href="{{ asset('#contacts') }}" class="header__nav-btn__name">Контакты</a>
                <a href="{{ asset('/#benefits') }}" class="header__nav-btn__name">О компании</a>
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
                        <button class="header__nav-btn" id="dropdownMenuLink" data-bs-toggle="dropdown">
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
                    @if(!auth()->user()->isAdmin())
                        <div class="dropdown">
                            <button class="header__nav-btn" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown">
                                <img class="user-img" src="{{ auth()->user()->imageUrl() }}" alt="user-img">
                                <span class="header__nav-btn__name">Кабинет</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('account.index') }}">Главная</a></li>
                                <li><a class="dropdown-item" href="{{ route('account.personalData') }}">Мои данные</a></li>
                                <li><a class="dropdown-item" href="{{ route('account.orders') }}">Мои заказы</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('auth.logoutUser') }}">Выйти</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="dropdown">
                            <button class="header__nav-btn" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown">
                                <img class="user-img" src="{{ auth()->user()->imageUrl() }}" alt="user-img">
                                <span class="header__nav-btn__name">Админ панель</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('admin.index') }}">Главная</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.personalData') }}">Мои данные</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.showProducts') }}">Продукты</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.showCollections') }}">Категории</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.showOrders') }}">Заказы</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.showRequests') }}">Заявки</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('auth.logoutUser') }}">Выйти</a></li>
                            </ul>
                        </div>
                    @endif
                @endauth
                <a href="{{ route('cart.index') }}">
                    <div class="header__nav-btn">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p class="header__nav-btn__name">Корзина</p>
                    </div>
                </a>
            </nav>
        </div>
    </div>
</header>
