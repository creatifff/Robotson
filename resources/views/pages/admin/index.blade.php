@extends('layout.admin')

@section('meta-description', 'Личный кабинет в Robotson. Создайте свой аккаунт!')

@section('title', 'Главная')

@section('content')
    <h3 class="profile__action-title">Здравствуйте, {{ auth()->user()->name }}!</h3>
@endsection
