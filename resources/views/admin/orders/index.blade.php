@extends('layouts.admin')

@section('content')
Заказы <a href="{{route('admin.orders.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
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
                    <a href="{{route('admin.orders.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('admin.orders.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
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