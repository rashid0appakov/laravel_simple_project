@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Список ролей</div>
    @can('create-role')
    <div class="col text-right"><a href="{{route('admin.roles.create')}}" class="btn btn-sm btn-primary">Новая запись</a></div>
    @endcan
</div>
<hr>
@if($roles->count())
{{$roles->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        @foreach($roles as $role)
            <tr>
                <td width="100px" class="font-bold">{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td width="150px">@if($role->id != 1)<a href="{{route('admin.roles.edit', $role->id)}}" class="btn btn-sm btn-primary">Редактировать</a>@endif</td>
            </tr>
        @endforeach
    </table>
</div>
{{$roles->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop