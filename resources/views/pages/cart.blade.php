@extends('layout.layout')

@section('title', 'Корзина')

@section('content')
    <section class="section white">
        <div class="container__main">

            @if($cart->isEmpty())
                <div class="cart-if-empty">
                    <img src="{{ asset('public/images/empty-cart-icon.png') }}" alt="empty-cart-image">
                    <h6>Ваша корзина пуста</h6>
                    <p>Перейдите в каталог и выберите своего робота!<br>Мы уверены, вы найдете то, что искали!</p>
                    <a class="cart__order-btn" href="{{ route('page.catalog') }}">Выбрать робота</a>
                </div>
            @else

                <h1 class="section__title white">Корзина</h1>
                <div class="cart__content">

                    <div class="cart__inner">
                        <table>
                            <thead class="hidden-phone">
                            <tr>
                                <th class="table-cell__left">Продукт(ы)</th>
                                <th style="white-space: nowrap" class="table-cell__center">В наличии</th>
                                <th class="table-cell__right">Стоимость</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($cart->get() as $product)
                                <tr>
                                    <td class="line-item__product-info">
                                        <div class="cart-product">
                                            <a href="{{ route('product.show', $product) }}">
                                                <img src="{{ $product->images()->first()->path() }}"
                                                     alt="{{ $product->name }}">
                                            </a>
                                            <div class="cart-product__info">
                                                <a href="">
                                                    <div
                                                        class="cart-product-category">{{ $product->collection->name }}</div>
                                                </a>
                                                <a href="{{ route('product.show', $product) }}">
                                                    <div class="cart-product-name">{{ $product->name }}</div>
                                                </a>
                                                <div style="white-space: nowrap"
                                                     class="cart-product-price">{{ $product->money() }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="line-item__product-info">
                                        <div style="white-space: nowrap" class="cart-product-qty">
                                            {{ $product->quantity }} шт.
                                        </div>
                                    </td>
                                    <td class="line-item__product-info">
                                        <div class="table__cell-block">
                                            <span style="white-space: nowrap"
                                                  class="cart-product-price total">{{ $product->money() }}</span>
                                            <a href="{{ route('cart.remove', $product) }}">
                                                <div class="remove-cart__btn">
                                                    <i class="fa-solid fa-delete-left"></i>
                                                    <p>Убрать</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="cart__total">
                        <div class="total__text total-qty">
                            <p>В корзине:</p>
                            <span style="white-space: nowrap">{{ $cart->count() }} шт.</span>
                        </div>
                        <div class="total__text">
                            <p>Итого:</p>
                            <span style="white-space: nowrap">{{ $cart->getTotal() }} ₽</span>
                        </div>
                        <div class="total__text-shipping">Вы сможете оплатить заказ после получения реквизитов.</div>
                        <a class="cart__order-btn" href="{{ route('cart.createOrder') }}">Оформить заказ</a>
                        <a class="clear__cart-btn" href="{{ route('cart.clear') }}">Очистить корзину</a>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
