@extends('layout.admin')

@section('title', 'Все категории')

@section('content')
    @if($collections->count())
        <table>
            <thead class="hidden-phone">
            <tr>
                <th class="table-cell__left">Категория</th>
                <th class="table-cell__right">Дата создания</th>
            </tr>
            </thead>
            <tbody>
            @foreach($collections as $collection)
                <tr>
                    <td class="line-item__product-info left">
                        <div>
                            <h4>{{ $collection->name }}</h4>
                        </div>
                    </td>
                    <td class="line-item__product-info end">
                        <div>
                            <p>{{ $collection->createdDate() }}</p>
                            <a class="admin-edit-btn" href="{{ route('admin.collection.updateCollection', $collection) }}">
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
            <p>Категорий нет</p>
        </div>
    @endif
    <div class="pagination">
        {{ $collections->links() }}
    </div>
@endsection
