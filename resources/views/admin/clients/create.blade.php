@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Новый клиент</div>
    <div class="col text-right"><a href="{{route('admin.clients.index')}}" class="btn btn-sm btn-primary">К списку</a></div>
</div>
<hr>
<form action="{{route('admin.clients.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Форма собственности</label>
                <select name="form" class="form-control form-control-sm">
                    <option @if(!old('form')) selected @endif value="">-</option>
                    <option @if(old('form') == 1) selected @endif value="1">ИП</option>
                    <option @if(old('form') == 2) selected @endif value="2">ООО</option>
                    <option @if(old('form') == 3) selected @endif value="3">ЗАО</option>
                    <option @if(old('form') == 4) selected @endif value="4">ОАО</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Телефон</label>
                <input type="text" class="form-control form-control-sm @error('phone') has-invalid @enderror" name="phone" value="{{old('phone')}}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" class="form-control form-control-sm @error('email') has-invalid @enderror" name="email" value="{{old('email')}}">
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Контактное лицо</label>
                <input type="text" class="form-control form-control-sm @error('contact') has-invalid @enderror" name="contact" value="{{old('contact')}}">
                @error('contact')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Адрес</label>
                <input type="text" class="form-control form-control-sm @error('address') has-invalid @enderror" name="address" value="{{old('address')}}">
                @error('address')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>&nbsp;</label>
        <button class="btn btn-block btn-outline-secondary btn-sm">Сохранить</button>
    </div>
</form>
@stop