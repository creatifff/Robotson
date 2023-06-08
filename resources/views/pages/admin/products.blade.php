@extends('layout.admin')

@section('title', 'Все продукты')

@section('content')
    <h3 class="profile__action-title">Продукты:</h3>

    @if($products->count())

        <div class="users__content">
            @foreach($products as $product)
                <div>
                    <h4><a href="{{ route('product.show', $product) }}">{{ $product->name }}</a></h4>
                    <p>{{ $product->collection->name }}</p>
                    <p>{{ $product->money() }}</p>
                    <p>{{ $product->created_at }}</p>
                    <p>{{ $product->updated_at }}</p>

                    <a href="{{ route('admin.product.updateProduct', $product) }}">
                        Редактировать
                    </a>
                </div>
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
