@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Редактирование склада</div>
    <div class="col text-right"><a href="{{route('admin.stocks.index')}}" class="btn btn-sm btn-primary">К списку</a></div>
</div>
<hr>
<form action="{{route('admin.stocks.update', $stock->id)}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label>Название</label>
        <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name') ? old('name') : $stock->name}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Адрес</label>
        <input type="text" class="form-control form-control-sm @error('address') has-invalid @enderror" name="address" value="{{old('address') ? old('address') : $stock->address}}">
        @error('address')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Емкость</label>
        <input type="text" class="form-control form-control-sm @error('size') has-invalid @enderror" name="size" value="{{old('size') ? old('size') : $stock->size}}">
        @error('size')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Заполнено</label>
        <input type="text" class="form-control form-control-sm @error('filled') has-invalid @enderror" name="filled" value="{{old('filled') ? old('filled') : $stock->filled}}">
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