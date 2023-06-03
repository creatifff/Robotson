@extends('layout.layout')

@section('title', 'Главная')

@section('content')
    <!-- Intro section -->
    <section class="intro">
        <div class="intro__background">
            <video
                class="background__video"
                src="{{ asset('public/video/intro-video.mp4')}}"
                autoplay
                loop
                muted
            ></video>
        </div>
        <div class="intro__wrapper">
            <div class="container__main">
                <div class="intro__content">
                    <h1 class="intro__title">
                        Найдите лучшего робота под свои задачи в Robotson
                    </h1>
                    <h2 class="intro__subtitle">
                        Интернет-магазин по продаже роботов большого назначения и услуг цифровизации
                    </h2>
                    <div class="intro__btn">
                        <a href="{{ route('page.catalog') }}" class="intro__offer-btn">Выбрать робота</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits section -->
    <section id="benefits" class="section white">
        <div class="container__main">
            <h2 class="section__title white benefits-title">Почему стоит выбрать именно Robotson</h2>
            <div class="benefits__content">
                <div class="benefit">
                    <img src="{{ asset('public/images/range-icon.png') }}" alt="range-feature-icon">
                    <div class="benefit__text">
                        <h6>Широкий ассортимент роботов</h6>
                        <p>
                            В нашем каталоге вы найдете самые разнообразные
                            модели роботов под вашу задачу.
                            Они могут быть использованы в различных целях
                            - от производства до личного пользования.
                        </p>
                    </div>
                </div>
                <div class="benefit">
                    <img src="{{ asset('public/images/approach-icon.png') }}" alt="approach-feature-icon">
                    <div class="benefit__text">
                        <h6>Индивидуальный подход</h6>
                        <p>
                            С помощью нашей компании вы сможете заказать робота с индивидуальной концепцией,
                            уникальным дизайном и конструкцией любой сложности под различные задачи.
                        </p>
                    </div>
                </div>
                <div class="benefit">
                    <img src="{{ asset('public/images/software-icon.png') }}" alt="software-feature-icon">
                    <div class="benefit__text">
                        <h6>Не просто магазин</h6>
                        <p>
                            Мы поможем вам не только с выбором робота,
                            но и в разработке или настройке вашего ПО,
                            3D-сканировании и цифровизации вашего объекта.
                        </p>
                    </div>
                </div>
                <div class="benefit">
                    <img src="{{ asset('public/images/support-icon.png') }}" alt="support-feature-icon">
                    <div class="benefit__text">
                        <h6>Профессиональная техническая поддержка</h6>
                        <p>Наша служба поддержки всегда готова ответить на ваши вопросы и помочь решить любые проблемы,
                            связанные с нашими роботами и услугами.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services section -->
    <section id="services" class="section black">
        <div class="container__main">
            <h2 class="section__title black services-title">Услуги, благодаря которым усовершенствуется ваше
                предприятие</h2>
            <div class="services__content">

                <div class="nav-pills" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-robots-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-robots" type="button" role="tab" aria-controls="v-pills-robots"
                            aria-selected="true">Роботы "под ключ"
                    </button>
                    <button class="nav-link" id="v-pills-digital-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-digital" type="button" role="tab" aria-controls="v-pills-digital"
                            aria-selected="false">Цифровизация
                    </button>
                    <button class="nav-link" id="v-pills-laser-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-laser" type="button" role="tab" aria-controls="v-pills-laser"
                            aria-selected="false">Лазерное 3D-сканирование
                    </button>
                    <button class="nav-link" id="v-pills-development-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-development" type="button" role="tab"
                            aria-controls="v-pills-development"
                            aria-selected="false">Разработка ПО
                    </button>
                </div>

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-robots" role="tabpanel"
                         aria-labelledby="v-pills-robots-tab">
                        <div class="service__tab-flex">
                            <div class="tab-text">
                                Комплекс услуг по разработке индивидуальной концепции,
                                созданию дизайна и конструкции роботов
                                любой сложности под различные задачи
                            </div>
                            <img src="{{ asset('public/images/services-img1.png') }}" alt="service-img-robot">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-digital" role="tabpanel"
                         aria-labelledby="v-pills-digital-tab">
                        <div class="service__tab-flex">
                            <div class="tab-text">
                                <ul>
                                    <li class="listed-item-digital">
                                        создание полной трехмерной модели действующего предприятия
                                    </li>
                                    <li class="listed-item-digital">
                                        проектирование вновь создаваемых производственных объектов
                                    </li>
                                    <li class="listed-item-digital">обратный инжиниринг</li>
                                </ul>
                            </div>
                            <img src="{{ asset('public/images/digital-service.png') }}" alt="service-img-digital">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-laser" role="tabpanel"
                         aria-labelledby="v-pills-laser-tab">
                        <div class="service__tab-flex">
                            <div class="tab-text">
                                <ul>
                                    <li class="listed-item-digital">
                                        наземное лазерное сканирование
                                    </li>
                                    <li class="listed-item-digital">
                                        трёхмерная лазерная съёмка фасадов
                                    </li>
                                    <li class="listed-item-digital">
                                        лазерное сканирование зданий и сооружений
                                    </li>
                                    <li class="listed-item-digital">
                                        3D-сканирование промышленных объектов
                                    </li>
                                </ul>
                            </div>
                            <img src="{{ asset('public/images/3d-scan-service.png') }}" alt="service-img-3d-scan">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-development" role="tabpanel"
                         aria-labelledby="v-pills-development-tab">
                        <div class="service__tab-flex">
                            <div class="tab-text">
                                <p>
                                    Создание программных комплексов по оптимизации:
                                </p>
                                <ul>
                                    <li class="listed-item-digital">технологических процессов</li>
                                    <li class="listed-item-digital">рабочего времени сотрудника</li>
                                    <li class="listed-item-digital">логистических потоков</li>
                                    <li class="listed-item-digital">бумажного документооборота</li>
                                </ul>
                            </div>
                            <img src="{{ asset('public/images/services-img4.png') }}" alt="service-img-development">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Last items section -->
    <section class="section white">
        <div class="container__main">
            <div class="last-items-section-title">
                <h3 class="section__title white last-items-title">Последние продукты</h3>
                <a href="{{ route('page.catalog') }}">Показать все</a>
            </div>
            <div style="--swiper-navigation-color: #0e0e0e; --swiper-pagination-color: #0e0e0e" class="swiper mySwiper">
                <div class="swiper-wrapper last-items-slider">
                    @foreach($products as $product)
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="item__image">
                                    <a href="{{ route('product.show', $product) }}">
                                        @if($product->images()->count() > 0)
                                            <img class="item-img" src="{{ $product->images()->first()->path() }}"
                                                 alt="{{ $product->name }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="item__content">
                                    <div class="item__category">
                                        <h4 class="item-category">{{ $product->collection->name }}</h4>
                                    </div>
                                    <div class="item__name">
                                        <a href="{{ route('product.show', $product) }}">
                                            <h3 class="item-name">{{ $product->name }}</h3>
                                        </a>
                                    </div>
                                    <div class="item__price">
                                        <p class="item-price">{{ $product->money() }}</p>
                                    </div>
                                    <div class="item__btns-content">
                                        <a class="item__btn btn-transparent" href="#">В корзину</a>
                                        {{--                                    <a class="item__btn to-favourite-btn" href="#">--}}
                                        {{--                                        <i class="fa-solid fa-heart"></i>--}}
                                        {{--                                    </a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <!-- Request section -->
    <section class="section request-section">
        <div class="container__main">
            <div class="request-section__content">
                <div class="request-section__title">
                    <h2 class="section__title request-title">
                        Определились с услугой?
                    </h2>
                    <p>Оставьте заявку, и мы свяжемся с вами в ближайшее время</p>
                </div>
                <form class="request-form" action="{{ route('request.leaveRequest') }}" method="post">
                    @csrf
                    <div class="form-request-block">
                        <div class="form__input-column">
                            <label for="name">Ваше имя</label>
                            <input type="text" class="form__input is-invalid" id="name" name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form__input-column">
                            <label for="phone_number">Номер телефона</label>
                            <input type="text" class="form__input is-invalid" id="phone_number" name="phone_number">
                            @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label>
                            <select class="form__input" name="service">
                                <option disabled selected>Выберите услугу</option>
                                <option value="Роботы 'под ключ'">Роботы "под ключ"</option>
                                <option value="Цифровизация">Цифровизация</option>
                                <option value="Лазерное 3D-сканирование">Лазерное 3D-сканирование</option>
                                <option value="Разработка ПО">Разработка ПО</option>
                            </select>
                        </label>
                        @error('service')
                        <div class="invalid-feedback-select">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-request-block">
                        <div class="form__input-column">
                            <label for="question">Ваш вопрос (необязательно)</label>
                            <textarea class="form__textarea" id="question" rows="4" name="question"></textarea>
                        </div>
                        <button type="submit" class="form__btn">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Partners section -->
    <section class="section white partners-section">
        <div class="container__main">
            <div class="section__title partners__title">Наши партнеры</div>
            <div class="partners__grid">
                <img class="partner__img" src="{{ asset('public/images/gaztech-partner.png') }}" alt="partner-logo"/>
                <img class="partner__img" src="{{ asset('public/images/2050-partner.png') }}" alt="partner-logo"/>
                <img class="partner__img" src="{{ asset('public/images/fora-partner.png') }}" alt="partner-logo"/>
                <img class="partner__img" src="{{ asset('public/images/roskosmos-partner.png') }}" alt="partner-logo"/>
                <img class="partner__img" src="{{ asset('public/images/dumbspecnaz-partner.png') }}"
                     alt="partner-logo"/>
            </div>
        </div>
    </section>
@endsection
