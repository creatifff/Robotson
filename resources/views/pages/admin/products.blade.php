@extends('layout.admin')

@section('title', 'Все продукты')

@section('content')
    @if($products->count())
        <table>
            <thead class="hidden-phone">
            <tr>
                <th class="table-cell__left">Продукт</th>
                <th class="table-cell__center">Категория</th>
                <th class="table-cell__center">Цена</th>
                <th class="table-cell__right">Создан</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="line-item__product-info left">
                        <div>
                            <h4>{{ $product->name }}</h4>
                            <a class="admin-edit-btn" href="{{ route('product.show', $product) }}">Страница продукта</a>
                        </div>
                    </td>
                    <td class="line-item__product-info center">
                        <div>
                            <p class="collection-name">{{ $product->collection->name }}</p>
                        </div>
                    </td>
                    <td class="line-item__product-info center">
                        <div>
                            <p class="price-name" style="white-space: nowrap">{{ $product->money() }}</p>
                        </div>
                    </td>
                    <td class="line-item__product-info end">
                        <div>
                            <p>{{ $product->createdDate() }}</p>
                            <a class="admin-edit-btn" href="{{ route('admin.product.updateProduct', $product) }}">
                                Редактировать
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <div class="orders__empty">
            <p>Продуктов не найдено</p>
        </div>
    @endif
    <div class="pagination">
        {{ $products->links() }}
    </div>
@endsection
