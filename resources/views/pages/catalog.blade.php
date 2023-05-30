@extends('layout.layout')

@section('title', 'Каталог')

@section('content')
    <section class="section__page">
        <div class="container__main">
            <h1 class="section__title white">Каталог</h1>
            <div class="catalog__content">
                <div class="categories__aside">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                    Категории
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    @foreach($collections as $collection)
                                        <a href="?collection={{ $collection->id }}"
                                           class="collection">{{ $collection->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <h4 class="item__category">{{ $product->collection->name }}</h4>
                                <a href="{{ route('product.show', $product) }}">
                                    <h3 class="item__name">{{ $product->name }}</h3>
                                </a>
                                <p class="item__price">{{ $product->money() }}</p>
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
