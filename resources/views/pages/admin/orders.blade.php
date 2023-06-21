@extends('layout.admin')

@section('title', 'Список заказов')

@section('content')
    @if($orders->count())
        <table>
            <thead class="hidden-phone">
            <tr>
                <th class="table-cell__left">№ заказа</th>
                <th class="table-cell__left">Данные покупателя</th>
                <th class="table-cell__left">Продукты</th>
                <th class="table-cell__right">Итоговая сумма</th>
                <th class="table-cell__right">Статус заказа</th>
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
                    <td class="line-item__product-info left">
                        <div>
                            <p style="white-space: nowrap; font-size: 14px">{{ $order->user->getFullNameAttribute() }}</p>
                            <a href="tel:{{ $order->user->phone_number }}">
                                <p style="font-size: 13px; color: #406ec1; text-decoration: underline">{{ $order->user->phone_number }}</p>
                            </a>
                            <a href="mailto:{{ $order->user->email }}">
                                <p style="font-size: 13px; color: #406ec1; text-decoration: underline">{{ $order->user->email }}</p>
                            </a>
                        </div>
                    </td>
                    <td class="line-item__product-info left">
                        <div>
                            <ol style="margin: 0; padding-left: 1rem">
                                @foreach($orderProducts as $orderItem)
                                    <li style="font-size: 13px">
                                        {{ $orderItem->product->name }}
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </td>
                    <td class="line-item__product-info end">
                        <div>
                            <p style="white-space: nowrap; font-size: 14px">{{ $order->totalPrice() }}</p>
                        </div>
                    </td>
                    <td class="line-item__product-info end">
                        <div>
                            <p style="font-size: 14px;">{{ $order->status }}</p>
                            @switch($order->status)
                                @case('В обработке')
                                    <a style="font-size: 13px" class="admin-edit-btn"
                                       href="{{ route('admin.order.toggle', [$order, 'status' => 'Принят']) }}">Изменить
                                        статус</a>
                                    @break
                                @case('Принят')
                                    <a style="font-size: 13px" class="admin-edit-btn"
                                       href="{{ route('admin.order.toggle', [$order, 'status' => 'Отправлен']) }}">Изменить
                                        статус</a>
                                    @break
                                @case('Отправлен')
                                    <a style="font-size: 13px" class="admin-edit-btn"
                                       href="{{ route('admin.order.toggle', [$order, 'status' => 'Завершен']) }}">Изменить
                                        статус</a>
                                    @break
                                @case('Завершен')
                                    <a style="font-size: 13px" class="admin-edit-btn"
                                       href="{{ route('admin.order.toggle', [$order, 'status' => 'В обработке']) }}">Изменить
                                        статус</a>
                                    @break
                            @endswitch
                            <form class="delete-product-form"
                                  action="{{ route('admin.order.deleteOrder', $order->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button style="font-size: 13px" class="admin-delete-btn" type="submit">Отменить заказ
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="orders__empty">
            <p>Заказов не найдено</p>
        </div>
    @endif
@endsection
