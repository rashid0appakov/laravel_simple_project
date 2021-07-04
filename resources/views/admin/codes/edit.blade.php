@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Редактирование кода</div>
    <div class="col text-right">
        <a href="{{route('admin.codes.index')}}" class="btn btn-sm btn-primary">К списку</a>
    </div>
</div>
<hr>
<form action="{{route('admin.codes.update', $code->id)}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        <div class="col-md-2 form-group">
            <label>Код</label>
            <input type="text" class="form-control form-control-sm @error('code') has-invalid @enderror" name="code" value="{{old('code') ? old('code') : $code->code}}">
            @error('code')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Наименование отхода</label>
            <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name') ? old('name') : $code->name}}">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Виды деятельности</label>
            <input type="text" class="form-control form-control-sm @error('types') has-invalid @enderror" name="types" value="{{old('types') ? old('types') : $code->types}}">
            @error('types')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-2 form-group">
            <label>&nbsp;</label>
            <button class="btn btn-block btn-outline-secondary btn-sm">Сохранить</button>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-success">Сохранить</button>
    </div>
</form>
@stop