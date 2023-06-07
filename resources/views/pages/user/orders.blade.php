@php use Carbon\Carbon; @endphp
@extends('layout.user')

@section('title', 'Заказы')

@section('content')
    @if(!$orders->isEmpty())
        <div class="orders__empty">
            <p>Заказов не найдено</p>
            <a class="catalog__order-btn" href="{{ route('page.catalog') }}">В каталог</a>
        </div>
    @else
        <table>
            <thead class="hidden-phone">
            <tr>
                <th class="table-cell__left">Заказ</th>
                <th class="table-cell__center">Оформлен</th>
                <th class="table-cell__center">Стоимость</th>
                <th class="table-cell__right">Статус</th>
            </tr>
            </thead>
            <tbody>

            @foreach($orders as $order)
                @foreach($order->products as $product)
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Элемент аккордеона #1
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
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
                        </div>
                    </div>
                </div>
            </div>

                    <tr>
                        <td class="line-item__product-info">
                            № {{ $order->id }}
                        </td>
                        <td class="line-item__product-info">
                            {{ Carbon::parse($order->created_at)->format('d.m.Y') }}
                        </td>
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
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
