@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Редактирование пользователя</div>
    <div class="col text-right">
        <a href="{{route('admin.users.index')}}" class="btn btn-sm btn-primary">К списку</a>
        @can('delete-user')
        <form action="{{route('admin.users.destroy', $user->id)}}" class="d-inline confirmed" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button href="{{route('admin.users.index')}}" class="btn btn-sm btn-danger">Удалить</button>
        </form>
        @endcan
    </div>
</div>
<hr>
<form action="{{route('admin.users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group form-check">
        <input name="active" type="checkbox" class="form-check-input" id="active" @if($user->active) checked @endif>
        <label class="form-check-label" for="active">Активен</label>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label>ФИО</label>
                <input type="text" class="form-control form-control-sm" name="name" value="{{old('name') ? old('name') : $user->name}}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Роль</label>
                <select name="role_id" class="form-control form-control-sm">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}" @if((old('role_id') && old('role_id') == $role->id) ||$role->id == $user->role_id) selected @endif>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control form-control-sm" name="email" value="{{old('email') ? old('email') : $user->email}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" class="form-control form-control-sm" name="password">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="d-block">Фото</label>
                <input type="file" name="photo">
            </div>
        </div>
        <div class="col-md-6">
            @if($user->photo)
            <img src="/storage/{{$user->photo}}" alt="{{$user->name}}" class="img-fluid">
            @endif
        </div>
    </div>
    @can('update-user')
    <div class="form-group">
        <button class="btn btn-sm btn-success">Сохранить</button>
    </div>
    @endcan
</form>
@stop