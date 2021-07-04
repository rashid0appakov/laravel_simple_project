@extends('layouts.admin')

@section('content')
<div class="row align-items-center">
    <div class="col">Список новостей</div>
    <div class="col-2">
        <form action="" class="input-group">
            <select name="status" class="form-control form-control-sm">
                <option value="">-</option>
                @foreach(\App\Models\Post::$statuses as $key => $item)
                    <option value="{{$key}}" @if($status == $key) selected @endif>{{$item}}</option>
                @endforeach
            </select>
            <div class="input-group-append">
                <button class="btn btn-sm btn-primary"><span class="fa fa-filter"></span></button>
            </div>
        </form>
    </div>
    @can('create-post')
    <div class="col text-right"><a href="{{route('admin.posts.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Новая запись</a></div>
    @endcan
</div>
<hr>
@if($posts->count())
{{$posts->links('vendor.pagination.bootstrap-4')}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>ID</th>
            <th>Статус</th>
            <th>Заголовок</th>
            <th>Рубрика</th>
            <th width="100px">Добавлено</th>
            <th width="100px">Акстивность</th>
            <th>Комментарии</th>
            <th>Ячейка</th>
            <th>Марафон</th>
            <th>Бегущая</th>
            <th>Анонс</th>
            <th width="80px">Действия</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td class="font-bold">{{$post->id}}</td>
                <td>{{\App\Models\Post::$statuses[$post->status]}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->category ? $post->category->name : '-'}}</td>
                <td>{{$post->created_at->format('d.m.Y H:i')}}</td>
                <td>
                    {{$post->active_from ? $post->active_from->format('d.m.Y H:i') : ''}}
                    <br>
                    {{$post->active_to ? $post->active_to->format('d.m.Y H:i') : ''}}
                </td>
                <th>@if($post->commentable) <i class="fa fa-check text-success"></i> @else <i class="fa fa-remove text-danger"></i> @endif</th>
                <th>{{$post->area}}</th>
                <th>@if($post->marafon) <i class="fa fa-check text-success"></i> @else <i class="fa fa-remove text-danger"></i> @endif</th>
                <th>@if($post->top) <i class="fa fa-check text-success"></i> @else <i class="fa fa-remove text-danger"></i> @endif</th>
                <th>@if($post->ticker) <i class="fa fa-check text-success"></i> @else <i class="fa fa-remove text-danger"></i> @endif</th>
                <td>
                    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="{{route('posts.show', [$post->category->slug, $post->slug])}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$posts->links('vendor.pagination.bootstrap-4')}}
@else
<p>Записей не найдено</p>
@endif
@stop