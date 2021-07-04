@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Новый пользователь</div>
    <div class="col text-right"><a href="{{route('admin.users.index')}}" class="btn btn-sm btn-primary">К списку</a></div>
</div>
<hr>
<form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group form-check">
        <input name="active" type="checkbox" class="form-check-input" id="active" checked>
        <label class="form-check-label" for="active">Активен</label>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label>ФИО</label>
                <input type="text" class="form-control form-control-sm" name="name">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Роль</label>
                <select name="role_id" class="form-control form-control-sm">
                    <option value="" selected disabled>-</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control form-control-sm" name="email">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" class="form-control form-control-sm" name="password">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="d-block">Фото</label>
        <input type="file" name="photo">
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-success">Сохранить</button>
    </div>
</form>
@stop