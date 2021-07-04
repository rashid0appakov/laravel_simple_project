@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Редактирование категории</div>
    <div class="col text-right">
        <a href="{{route('admin.dust_categories.index')}}" class="btn btn-sm btn-primary">К списку</a>
    </div>
</div>
<hr>
<form action="{{route('admin.dust_categories.update', $dust_category->id)}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label>Название:</label>
        <input type="text" class="form-control form-control-sm" name="name" value="{{old('name') ? old('name') : $dust_category->name}}">
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-success">Сохранить</button>
    </div>
</form>
@stop