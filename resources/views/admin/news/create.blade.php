@extends('layouts.admin')

@section('content')

<div class="col text-right">
        <a href="{{route('admin.news.index')}}" class="btn btn-sm btn-primary">К списку</a>
    </div>
    
<form action="{{ route('news.store') }}" method="POST">
@csrf
<div class="mb-3">
  <input type="text" name="title" placeholder="Введите название новости">
</div>
<div class="mb-3">
  <input type="text" name="img" placeholder="Введите ссылку на фото">
</div>
<div class="mb-3">
  <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

  <button type="submit" class="btn btn-primary">Добавить новость</button>
</form>

@stop