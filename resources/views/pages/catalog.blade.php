@extends('layout.layout')

@section('title', 'Каталог')

@section('content')
    <section class="section__page">
        <div class="page-header-bg__catalog">
            <div class="container__main">
                <h1 class="section__title black title-end">Каталог</h1>
                <p class="catalog-section-subtitle">Выберите высокое качество и низкую стоимость автоматизации для себя
                    или вашего дела</p>
            </div>
        </div>
        <div class="container__main">
            <div class="catalog__content">
                <div class="categories">
                    @foreach($collections as $collection)

                        <a href="?collection={{ $collection->id }}">
                            <div class="category">
                                <div class="category__name">
                                    <p>{{ $collection->name }}</p>
                                </div>
                                <img class="category__image" src="{{ $collection->image() }}"
                                     alt="{{ $collection->name }}">
                            </div>
                        </a>

                    @endforeach
                    @if(request()->get('collection'))
                        <a href="{{ route('page.catalog') }}" class="category-clear">
                            <div class="clear-btn">
                                <p>Сбросить</p>
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="catalog__grid">
                    @foreach($products as $product)
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
                                    <a class="item__btn btn-transparent" href="{{ route('product.addToCart', $product) }}">В корзину</a>
                                    {{--                                    <a class="item__btn to-favourite-btn" href="#">--}}
                                    {{--                                        <i class="fa-solid fa-heart"></i>--}}
                                    {{--                                    </a>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
