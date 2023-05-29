@extends('layout.admin')

@section('title', 'Главная')

@section('content')
    <h3 class="profile__action-title">Здравствуйте, {{ auth()->user()->getFullNameAttribute() }}!</h3>
@endsection
