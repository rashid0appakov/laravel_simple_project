@extends('layouts.admin')

@section('content')
Список категорий отходов
<hr>
<form action="{{route('admin.dusts.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6 form-group">
            <label>Название</label>
            <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <label>Категория</label>
            <select name="dust_category_id" class="form-control form-control-sm">
                <option value="">-</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('dust_category')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <textarea name="text" rows="5" class="form-control form-control-sm">{{old('text')}}</textarea>
        @error('text')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>&nbsp;</label>
        <button class="btn btn-block btn-outline-secondary btn-sm">Сохранить</button>
    </div>
</form>
<hr>
@if($dusts->count())
{{$dusts->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        @foreach($dusts as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td width="150px">
                    <a href="{{route('admin.dusts.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('admin.dusts.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$dusts->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop