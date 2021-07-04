@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Редактирование {{$dust->name}}</div>
    <div class="col text-right">
        <a href="{{route('admin.dusts.index')}}" class="btn btn-sm btn-primary">К списку</a>
    </div>
</div>
<hr>
<form action="{{route('admin.dusts.update', $dust->id)}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        <div class="col-md-6 form-group">
            <label>Название</label>
            <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name') ? old('name') : $dust->name}}">
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <label>Категория</label>
            <select name="dust_category_id" class="form-control form-control-sm">
                <option value="">-</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($dust->dust_category_id == $category->id) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
            @error('dust_category')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <textarea name="text" rows="5" class="form-control form-control-sm">{{old('text') ? old('text') : $dust->text}}</textarea>
        @error('text')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-success">Сохранить</button>
    </div>
</form>
@stop