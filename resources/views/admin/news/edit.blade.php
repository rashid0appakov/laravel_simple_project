@extends('layouts.admin')

@section('content')

<h1>Редактировать новость: {{ $news->title }}</h1>
<div class="col text-right">
        <a href="{{route('admin.news.index')}}" class="btn btn-sm btn-primary">К списку</a>
    </div>
<form action="{{ route('news.update', $news->id) }}" method="POST">
@csrf
@method('PUT')
<div class="mb-3">
  <input type="text" name="title" value="{{ $news->title }}" placeholder="Введите название новости">
</div>
<div class="mb-3">
  <input type="text" name="img" value="{{ $news->img }}" placeholder="Введите ссылку на фото">
</div>
<div class="mb-3">
  <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3">{{ $news->text }}</textarea>
</div>

  <button type="submit" class="btn btn-primary">Изменить новость</button>
</form>

@stop