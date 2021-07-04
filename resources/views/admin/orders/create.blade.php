@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Новый заказ</div>
    <div class="col text-right"><a href="{{route('admin.orders.index')}}" class="btn btn-sm btn-primary">К списку</a></div>
</div>
<hr>
<form action="{{route('admin.orders.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Статус</label>
                <select name="status" class="form-control form-control-sm">
                    @foreach(\App\Models\Order::$statuses as $key => $status)
                    <option value="{{$key}}" @if(old('status') == $key) selected @endif>{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Договор №</label>
                <input type="text" name="doc" class="form-control" value="{{old('doc')}}">
            </div>
            <div class="form-group">
                <label>Дата договора</label>
                <input type="text" name="doc_date" class="form-control" value="{{old('doc_date')}}">
            </div>
            <div class="form-group">
                <label>Файл договора <input type="file" name="file"></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <dropdown url="{{route('admin.clients.search')}}" name="client_id" title="Клиент"></dropdown>
            </div>
            <div class="form-group">
                <dropdown url="{{route('admin.companies.search')}}" preload="1" name="company_id" title="Компания"></dropdown>
            </div>
            <div class="form-group">
                <dropdown url="{{route('admin.stocks.search')}}" name="stock_id" title="Площадка"></dropdown>
            </div>
        </div>
    </div>
    <p class="small text-muted">Услуги</p>
    <services-list></services-list>
    <button class="btn btn-outline-secondary btn-sm">Сохранить</button>
</form>
@stop