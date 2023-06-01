@extends('layout.layout')

@section('title', $product->name)

@section('content')
    <section class="section white">
        <div class="container__main">
            <div class="single__product-content">

                <style>
                    .swiper {
                        width: 100%;
                        height: 100%;
                    }

                    .swiper-slide {
                        background-size: cover;
                        background-position: center;
                    }

                    .mySwiper2 {
                        height: 80%;
                        width: 100%;

                    }

                    .mySwiper3 {
                        height: 20%;
                        box-sizing: border-box;
                        padding: 10px 0;
                    }

                    .mySwiper3 .swiper-slide {
                        width: 25%;
                        height: 100%;
                        opacity: 0.4;
                    }

                    .mySwiper3 .swiper-slide-thumb-active {
                        opacity: 1;
                        border: 1px solid #dadada;
                    }

                    .swiper-slide img {
                        display: block;
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                </style>

                <div class="product-image__content">

                    <div
                        style="--swiper-navigation-color: #0e0e0e;
                            --swiper-pagination-color: #0e0e0e;"
                        class="swiper mySwiper2"
                    >
                        <div class="swiper-wrapper">
                            @foreach($product->images()->get() as $image)
                                <div class="swiper-slide">
                                    <img style="cursor: grab" class="user-select-none" src="{{ $image->path() }}"
                                         alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="swiper mySwiper3">
                        <div style="display: flex; flex-direction: row" class="swiper-wrapper">
                            @foreach($product->images()->get() as $image)
                                <div class="swiper-slide">
                                    <img style="cursor: pointer" class="user-select-none" src="{{ $image->path() }}"
                                         alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="product-info__content">
                    <h1 class="product-name">{{ $product->name }}</h1>
                    <h3 class="product-category">{{ $product->collection->name }}</h3>
                    <div class="price-block">
                        <div class="price-word">Стоимость :</div>
                        <div class="product-price-info">
                            <span class="price-span">{{ $product->money() }}</span>
                            <div class="price-message">
                                <div class="message-color">
                                    <p class="price-message__title">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        Специальный заказ
                                    </p>
                                    <p class="price-message__subtitle">Все наши продукты
                                        по
                                        специальному заказу. Заказ будет обработан в течение 1 недели.
                                    </p>
                                </div>
                                <p class="price-message__text">Это предмет специального заказа. Мы закажем его для
                                    вас,
                                    как только вы оформите заказ. Возврат товаров по специальному заказу и товаров
                                    из
                                    наличия не принимается, за исключением случаев, когда они признаны дефектными, в
                                    этом случае товар может быть отремонтирован или заменен по усмотрению Robotson.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="price-block">
                        <div class="price-word">В наличии :</div>
                        <span class="qty-span">{{ $product->quantity }} шт.</span>
                    </div>
                    <div class="product-btns">
                        <a class="item__btn single-product-btn" href="#">В корзину</a>
                        <a class="item__btn single-product-btn phone-us" href="#">Связаться с нами по поводу
                            продукта</a>
                    </div>
                </div>
            </div>
            <div class="product-text__content">
                <p class="product-text__title">Описание</p>
                <p class="product-description">{{ $product->text }}</p>
            </div>
        </div>
    </section>

    <section class="section white">
        <div class="container__main">
            <div class="last-items-section-title">
                <h3 class="section__title white last-items-title">Также рекомендуем</h3>
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

    <section class="section request-section">
        <div class="container__main">
            <div class="request-section__content">
                <div class="request-section__title">
                    <h2 class="section__title request-title">
                        Определились с услугой?
                    </h2>
                    <p>Оставьте заявку, и мы свяжемся с вами в ближайшее время</p>
                </div>
                <form class="request-form" method="POST">
                    <div class="form-request-block">
                        <div class="form__input-column">
                            <label for="email">Адрес электронной почты</label>
                            <input type="email" class="form__input" id="email">
                        </div>
                        <div class="form__input-column">
                            <label for="phone-number">Номер телефона</label>
                            <input type="text" class="form__input" id="phone-number">
                        </div>
                        <label>
                            <select class="form__input">
                                <option disabled selected>Выберите услугу</option>
                                <option value="1">Роботы "под ключ"</option>
                                <option value="2">Цифровизация</option>
                                <option value="3">Лазерное 3D-сканирование</option>
                                <option value="4">Разработка ПО</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-request-block">
                        <div class="form__input-column">
                            <label for="question">Ваш вопрос (необязательно)</label>
                            <textarea class="form__textarea" id="question" rows="4"></textarea>
                        </div>
                        <button type="submit" class="form__btn">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
