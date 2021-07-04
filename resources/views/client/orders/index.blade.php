@extends('layouts.client')

@section('content')
Мои заказы
<hr>
@if($orders->count())
{{$orders->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>№</th>
            <th>Договор</th>
            <th>Компания</th>
            <th>Клиент</th>
            <th>Площадка</th>
            <th>Статус</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>
        @foreach($orders as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>
                    {{$item->doc}}
                    @if($item->doc_date)
                    от {{$item->doc_date}}
                    @endif
                </td>
                <td>
                    @if($item->company) <span class="badge badge-info text-white">{{$item->company->name}}</span>
                    @else <span class="badge badge-warning">Не выбрано</span>
                    @endif
                </td>
                <td><span class="badge badge-info text-white">{{$item->client->name}}</span></td>
                <td>
                    @if($item->stock) <span class="badge badge-info text-white">{{$item->stock->name}}</span>
                    @else <span class="badge badge-warning">Не выбрано</span>
                    @endif
                </td>
                <td>{{\App\Models\Order::$statuses[$item->status]}}</td>
                <td class="small">{{$item->created_at->format('d.m.Y H:i')}}</td>
                <td>
                    <a href="{{route('client.orders.show', $item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                    <a href="{{route('admin.orders.doc1', $item->id)}}" class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-title="Акт приема на утилизацию отходов"><i class="fa fa-file"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$orders->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop