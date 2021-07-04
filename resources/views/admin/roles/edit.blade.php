@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Редактирование роли</div>
    <div class="col text-right">
        <a href="{{route('admin.roles.index')}}" class="btn btn-sm btn-primary">К списку</a>
        @can('delete-role')
        <form action="{{route('admin.roles.destroy', $role->id)}}" class="d-inline confirmed" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button href="{{route('admin.roles.index')}}" class="btn btn-sm btn-danger">Удалить</button>
        </form>
        @endcan
    </div>
</div>
<hr>
<form action="{{route('admin.roles.update', $role->id)}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label>Название:</label>
        <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name') ? old('name') : $role->name}}">
        @error('name')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="row">
        @foreach($permissions as $permission)
            <div class="col-md-3">
                <div class="form-group form-check">
                    <input name="permissions[{{$permission->id}}]" type="checkbox" class="form-check-input" id="p{{$permission->id}}" @if($role->permissions->contains('id', $permission->id)) checked @endif>
                    <label class="form-check-label" for="p{{$permission->id}}">{{$permission->label}}</label>
                </div>
            </div>
        @endforeach
    </div>
    @can('update-role')
    <div class="form-group">
        <button class="btn btn-sm btn-success">Сохранить</button>
    </div>
    @endcan
</form>
@stop