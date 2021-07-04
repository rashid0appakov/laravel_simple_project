@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Новый склад</div>
    <div class="col text-right"><a href="{{route('admin.stocks.index')}}" class="btn btn-sm btn-primary">К списку</a></div>
</div>
<hr>
<form action="{{route('admin.stocks.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label>Название</label>
        <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name')}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Адрес</label>
        <input type="text" class="form-control form-control-sm @error('address') has-invalid @enderror" name="address" value="{{old('address')}}">
        @error('address')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Емкость</label>
        <input type="text" class="form-control form-control-sm @error('size') has-invalid @enderror" name="size" value="{{old('size')}}">
        @error('size')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Заполнено</label>
        <input type="text" class="form-control form-control-sm @error('filled') has-invalid @enderror" name="filled" value="{{old('filled')}}">
        @error('filled')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>&nbsp;</label>
        <button class="btn btn-block btn-outline-secondary btn-sm">Сохранить</button>
    </div>
</form>
@stop