@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6 mb-3">
        Список классов ФККО
    </div>
    <div class="col-md-6">
        <form action="">
            <div class="input-group input-group-sm">
                <input type="text" name="q" class="form-control form-control-sm" placeholder="Поиск..." value="{{$q}}">
                <div class="input-group-append">
                    <button class="btn btn-sm btn-outline-secondary"><i class="fa fa-filter"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>
@can('create-code')
<form action="{{route('admin.codes.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-2 form-group">
            <label>Код</label>
            <input type="text" class="form-control form-control-sm @error('code') has-invalid @enderror" name="code" value="{{old('code')}}">
            @error('code')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Наименование отхода</label>
            <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Виды деятельности</label>
            <input type="text" class="form-control form-control-sm @error('types') has-invalid @enderror" name="types" value="{{old('types')}}">
            @error('types')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-2 form-group">
            <label>&nbsp;</label>
            <button class="btn btn-block btn-outline-secondary btn-sm">Сохранить</button>
        </div>
    </div>
</form>
<form action="{{route('admin.codes.import')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="d-flex">
        <input type="file" name="file">
        <button class="btn btn-outline-secondary btn-sm">Импортировать</button>
    </div>
</form>
<hr>
@endcan
@if($codes->count())
{{$codes->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>Код</th>
            <th>Наименование отхода</th>
            <th>Виды деятельности</th>
            <th>Действия</th>
        </tr>
        @foreach($codes as $item)
            <tr>
                <td class="font-bold">{{$item->code}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->types}}</td>
                <td width="150px">
                    <a href="{{route('admin.codes.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('admin.codes.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$codes->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop