@extends('layout.admin')

@section('title', 'Все продукты')

@section('content')
    <h3 class="profile__action-title">Продукты</h3>

    @if($products->count())

        <div class="users__content">
            @foreach($products as $product)
                <h1><a href="{{ route('product.show', $product) }}">{{ $product->name }}</a></h1>


                <a href="?collection={{ $product->collection_id }}">
                    {{ $product->collection->name }}
                </a>


                <a href="{{ route('admin.product.updateProduct', $product) }}">
                    Редактировать
                </a>
            @endforeach
        </div>

    @else
        <div class="orders__empty">
            <p>Продуктов нет</p>
        </div>
    @endif
    <div class="pagination">
        {{ $products->links() }}
    </div>
@endsection
