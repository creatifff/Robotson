@php use Carbon\Carbon; @endphp
@extends('layout.user')

@section('title', 'Мои заказы')

@section('content')
    @if($orders->isEmpty())
        <div class="orders__empty">
            <p>Вы пока ничего не покупали</p>
            <a class="catalog__order-btn" href="{{ route('page.catalog') }}">В каталог</a>
        </div>
    @else
        <table>
            <thead class="hidden-phone">
            <tr>
                <th class="table-cell__left">№ заказа</th>
                <th class="table-cell__center">Сумма</th>
                <th class="table-cell__center">Статус заказа</th>
                <th class="table-cell__right">Дата оформления</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td class="line-item__product-info left">
                        <div>
                            <h4>{{ $order->id }}</h4>
                        </div>
                    </td>
                    <td class="line-item__product-info center">
                        <div>
                            <p style="white-space: nowrap; font-size: 14px">{{ $order->totalPrice() }}</p>
                        </div>
                    </td>
                    <td class="line-item__product-info center">
                        <div>
                            <p style="font-size: 14px;">{{ $order->status }}</p>
                        </div>
                    </td>
                    <td class="line-item__product-info end">
                        <div>
                            <p style="font-size: 14px;">{{ Carbon::parse($order->created_at)->format('d.m.Y') }}</p>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
