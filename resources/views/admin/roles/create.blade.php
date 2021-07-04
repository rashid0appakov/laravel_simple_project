@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Новая роль</div>
    <div class="col text-right"><a href="{{route('admin.roles.index')}}" class="btn btn-sm btn-primary">К списку</a></div>
</div>
<hr>
<form action="{{route('admin.roles.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Название:</label>
        <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name')}}">
        @error('name')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="row">
        @foreach($permissions as $permission)
            <div class="col-md-3">
                <div class="form-group form-check">
                    <input name="permissions[{{$permission->id}}]" type="checkbox" class="form-check-input" id="p{{$permission->id}}">
                    <label class="form-check-label" for="p{{$permission->id}}">{{$permission->label}}</label>
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-success">Сохранить</button>
    </div>
</form>
@stop