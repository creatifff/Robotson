@extends('layout.layout')

@section('title', 'Добавить продукт')

@section('content')
    <section class="section">
        <div class="container__main">
            <h1 class="section__title white">Добавление</h1>
            <form action="" class="form" method="post" enctype="multipart/form-data">
                @csrf
                <label for="images">Добавьте несколько фото к продукту</label>
                <input type="file" id="images" name="images[]" multiple>
            </form>
        </div>
    </section>
@endsection
