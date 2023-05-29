@extends('layout.admin')

@section('title', 'Все продукты')

@section('content')
    <h3 class="profile__action-title">Продукты</h3>

    <div class="users__content">
        @foreach($products as $product)
            <div class="user__item">
                <span>{{ $product->id }}</span>
                <span>{{ $product->name }}</span>
                <span>{{ $product->money() }}</span>
            </div>
        @endforeach
    </div>
@endsection
