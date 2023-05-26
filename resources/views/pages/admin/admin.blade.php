@extends('layout.layout')

@section('title', 'Панель администратора')

@section('content')
    <section class="section">
        <div class="container__main">
            <h1 class="section__title white">Панель администратора {{ auth()->user()->imageUrl() }}</h1>
        </div>
    </section>
@endsection
