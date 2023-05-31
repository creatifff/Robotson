@extends('layout.layout')

@section('title', $product->name)

@section('content')
    <section class="section">
        <div class="container__main">
            <h1 class="section__title">{{ $product->name }}</h1>
            <div class="item__image">
                @foreach($product->images()->get() as $image)
                    <div class="swiper-slide">
                        <img src="{{ $image->path() }}" alt="{{ $product->name }}">
                    </div>
                @endforeach
            </div>
            <p>{{ $product->text }}</p>
            <span>{{ $product->money() }}</span>
        </div>
    </section>
@endsection
