@extends('layout.layout')

@section('title', 'Каталог')

@section('content')
    <section class="section__page">
        <div class="container__main">
            <h1 class="section__title white">Каталог</h1>
            <div class="catalog__content">
                <div class="categories">
                    @foreach($collections as $collection)
                        <a href="?collection={{ $collection->id }}"
                           class="collection">
                            <div class="category">
                                <img src="" alt="{{ $collection->name }}">
                                <p>{{ $collection->name }}</p>
                            </div>
                        </a>
                    @endforeach
                    @if(request()->get('collection'))
                        <a href="{{ route('page.catalog') }}" class="collection">Clear</a>
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
                                    <a class="item__btn btn-transparent" href="#">В корзину</a>
                                    <a class="item__btn to-favourite-btn" href="#">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
