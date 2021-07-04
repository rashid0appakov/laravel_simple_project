@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Заказ № {{$order->id}}</div>
    <div class="col">
        <span class="badge badge-info text-white">{{\App\Models\Order::$statuses[$order->status]}}</span>
        <a href="{{route('admin.orders.doc1', $order->id)}}" class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-title="Акт приема на утилизацию отходов"><i class="fa fa-file"></i></a>
    </div>
    <div class="col text-right"><a href="{{route('admin.orders.index')}}" class="btn btn-sm btn-primary">К списку</a></div>
</div>
<hr>
<form action="{{route('admin.orders.update', $order->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Статус</label>
                <select name="status" class="form-control form-control-sm">
                    @foreach(\App\Models\Order::$statuses as $key => $status)
                    <option value="{{$key}}" @if($order->status == $key) selected @endif>{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Договор №</label>
                <input type="text" name="doc" class="form-control form-control-sm" value="{{old('doc') ? old('doc'): $order->doc}}">
            </div>
            <div class="form-group">
                <label>Дата договора</label>
                <input type="text" name="doc_date" class="form-control form-control-sm" value="{{old('doc_date') ? old('doc_date'): $order->doc_date}}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Файл договора <input type="file" name="file"></label>
                    </div>
                </div>
                @if($order->file)
                    <div class="col-md-6">
                        <a href="{{route('admin.orders.file', $order->id)}}" target="_blank">Скачать</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <dropdown url="{{route('admin.clients.search')}}" name="client_id" title="Клиент" @if($order->client_id) :selected="{{$order->client}}" @endif></dropdown>
            </div>
            <div class="form-group">
                <dropdown url="{{route('admin.companies.search')}}" preload="1" name="company_id" title="Компания" @if($order->company_id) :selected="{{$order->company}}" @endif></dropdown>
            </div>
            <div class="form-group">
                <dropdown url="{{route('admin.stocks.search')}}" name="stock_id" title="Площадка" @if($order->stock_id) :selected="{{$order->stock}}" @endif></dropdown>
            </div>
        </div>
    </div>
    <p class="small text-muted">Услуги</p>
    <services-list :items="{{$order->services}}"></services-list>
    <button class="btn btn-outline-secondary btn-sm">Сохранить</button>
</form>
@stop