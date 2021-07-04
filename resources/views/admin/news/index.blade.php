@extends('layouts.admin')

@section('content')

<a href="{{ route('news.create') }}">Добавить новость</a>

<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>Заголовок</th>
            <th>Фотография</th>
            <th>Текст</th>
            <th>Дата добавления</th>
            <th>Действия</th>
        </tr>
        @foreach($news as $new)
            <tr>
                <td class="font-bold">{{$new->title}}</td>
                <td>{{$new->img}}</td>
                <td>{{$new->text}}</td>
                <td>{{$new->created_at}}</td>
                <td>
                    <a href="{{ route('news.edit', $new->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                    <form action="{{route('news.destroy', $new->id)}}" class="d-inline-block confirmed" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@stop