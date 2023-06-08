@extends('layout.admin')

@section('title', 'Все категории')

@section('content')
    <h3 class="profile__action-title">Категории:</h3>

    @if($collections->count())

        <div class="users__content">
            @foreach($collections as $collection)
                <div>
                    <h4>{{ $collection->name }}</h4>
                    <p>{{ $collection->created_at }}</p>
                    <p>{{ $collection->updated_at }}</p>
                    <a href="{{ route('admin.collection.updateCollection', $collection) }}">
                        Редактировать
                    </a>
                </div>
            @endforeach
        </div>

    @else
        <div class="orders__empty">
            <p>Категорий нет</p>
        </div>
    @endif
    <div class="pagination">
        {{ $collections->links() }}
    </div>
@endsection
