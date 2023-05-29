@extends('layout.layout')

@section('title', $product->name)

@section('content')
    <section class="section">
        <div class="container__main">
            <h1 class="section__title">{{ $product->name }}</h1>
            <p>{{ $product->text }}</p>
            <span>{{ $product->price }}</span>
        </div>
    </section>
@endsection
