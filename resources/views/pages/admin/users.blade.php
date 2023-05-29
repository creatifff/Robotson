@extends('layout.admin')

@section('title', 'Все пользователи')

@section('content')
            <h3 class="profile__action-title">Пользователи сайта</h3>

            <div class="users__content">
                @foreach($users as $user)
                    <div class="user__item">
                        <span>{{ $user->id }}</span>
                        <span>{{ $user->email }}</span>
                        <span>{{ $user->createdDate() }}</span>
                    </div>
                @endforeach
            </div>
@endsection
