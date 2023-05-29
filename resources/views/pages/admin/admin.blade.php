@extends('layout.layout')

@section('title', 'Панель администратора')

@section('content')
    <section class="section">
        <div class="container__main">
            <h1 class="section__title black">Панель администратора {{ auth()->user()->name }}</h1>
            <a href="{{ route('admin.createProduct') }}">Добавить продукт</a>
        </div>
    </section>
@endsection
