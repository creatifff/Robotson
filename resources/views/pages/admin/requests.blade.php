@extends('layout.admin')

@section('title', 'Список заявок на услуги')

@section('content')
    <h3 class="profile__action-title">Заявки</h3>
    <div class="users__content">
        @foreach($requests as $request)
            <div class="user__item">
                <span>{{ $request->id }}</span>
                <span>{{ $request->name }}</span>
                <span>{{ $request->phone_number }}</span>
                <span>{{ $request->service }}</span>
                <span>{{ $request->question }}</span>
            </div>
        @endforeach
    </div>
@endsection
