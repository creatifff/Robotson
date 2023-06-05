@extends('layout.layout')

@section('title', 'Корзина')

@section('content')
    <section class="section white">
        <div class="container__main">
            <h1 class="section__title white">Корзина</h1>
            <div class="cart__content">
                <div class="cart__inner">
                    <table>
                        <thead class="hidden-phone">
                            <tr>
                                <th class="table-cell__left">Продукты</th>
                                <th class="table-cell__center">В наличии</th>
                                <th class="table-cell__center">Стоимость</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-product">
                                        <img src="" alt="img">
                                        <div class="cart-product__info">
                                            <div class="cart-product-category">Манипуляторы</div>
                                            <div class="cart-product-name">Robot Thespian 4</div>
                                            <div class="cart-product-price">345 000 ₽</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-product-qty">2 шт</div>
                                </td>
                                <td>
                                    <span class="cart-product-price">345 000 ₽</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart__total"></div>
            </div>
        </div>
    </section>
@endsection
