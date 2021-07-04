@extends('layouts.admin')

@section('content')
Список категорий отходов
<hr>
<form action="{{route('admin.dust_categories.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4 form-group">
            <label>Название</label>
            <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-2 form-group">
            <label>&nbsp;</label>
            <button class="btn btn-block btn-outline-secondary btn-sm">Сохранить</button>
        </div>
    </div>
</form>
<hr>
@if($categories->count())
{{$categories->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        @foreach($categories as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td width="150px">
                    <a href="{{route('admin.dust_categories.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('admin.dust_categories.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$categories->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop