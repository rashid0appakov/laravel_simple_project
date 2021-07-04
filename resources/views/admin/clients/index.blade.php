@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-3 mb-3">
        Клиенты
        @can('create-client')
        <a href="{{route('admin.clients.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
        @endcan
    </div>
    <div class="col-md-9">
        <form action="">
            <div class="input-group input-group-sm">
                <select name="form" class="form-control form-control-sm">
                    <option @if(!$form) selected @endif value="">-</option>
                    <option @if($form == 1) selected @endif value="1">ИП</option>
                    <option @if($form == 2) selected @endif value="2">ООО</option>
                    <option @if($form == 3) selected @endif value="3">ЗАО</option>
                    <option @if($form == 4) selected @endif value="4">ОАО</option>
                </select>
                <input type="text" name="q" class="form-control form-control-sm" placeholder="Поиск..." value="{{$q}}">
                <div class="input-group-append">
                    <button class="btn btn-sm btn-outline-secondary"><i class="fa fa-filter"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>
@if($clients->count())
{{$clients->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>Название</th>
            <th>E-mail</th>
            <th>Телефон</th>
            <th>Контактное лицо</th>
            <th>Действия</th>
        </tr>
        @foreach($clients as $item)
            <tr>
                <td class="font-bold">{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td class="font-bold">{{$item->contact}}</td>
                <td width="150px">
                    <a href="{{route('admin.clients.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('admin.clients.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    <form action="{{route('admin.clients.order', $item->id)}}" method="post" class="d-inline-block">
                        @csrf
                        <button class="btn btn-sm btn-info" data-toggle="tooltip" data-title="Создать заказ"><i class="fa fa-plus"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$clients->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop