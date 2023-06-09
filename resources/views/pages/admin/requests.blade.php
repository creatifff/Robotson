@extends('layout.admin')

@section('title', 'Список заявок на услуги')

@section('content')
    @if($requests->count())
        <table>
            <thead class="hidden-phone">
            <tr>
                <th class="table-cell__left">№</th>
                <th class="table-cell__center">Имя отправителя</th>
                <th class="table-cell__center">Телефон</th>
                <th class="table-cell__center">Услуга</th>
                <th class="table-cell__right">Вопрос</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $request)
                <tr>
                    <td class="line-item__product-info left">
                        <div>
                            <h4>{{ $request->id }}</h4>
                        </div>
                    </td>
                    <td class="line-item__product-info center">
                        <div>
                            <p style="font-size: 14px">{{ $request->name }}</p>
                        </div>
                    </td>
                    <td class="line-item__product-info center">
                        <div>
                            <a href="tel:{{ $request->phone_number }}">
                                <p style="white-space: nowrap; font-size: 13px; color: #406ec1; text-decoration: underline">{{ $request->phone_number }}</p>
                            </a>
                        </div>
                    </td>
                    <td class="line-item__product-info center">
                        <div>
                            <p style="font-size: 14px;">{{ $request->service }}</p>
                        </div>
                    </td>
                    <td class="line-item__product-info center">
                        <div>
                            @if($request->question)
                                <p class="admin-request-question">
                                    {{ $request->question }}
                                </p>
                            @else
                                <p class="admin-request-no-question">(нет вопроса)</p>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="orders__empty">
            <p>Продуктов нет</p>
        </div>
    @endif
@endsection
