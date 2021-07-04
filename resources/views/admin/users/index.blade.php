@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        Пользователи
        @can('create-user')
        <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
        @endcan
    </div>
</div>
<hr>
@if($users->count())
{{$users->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>E-mail</th>
            <th>Роль</th>
            <th>Действия</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td width="100px" class="font-bold">{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><span class="badge badge-info">{{$user->role->name}}</span></td>
                <td width="150px">
                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$users->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop