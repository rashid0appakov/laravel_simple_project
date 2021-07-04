@extends('layouts.admin')

@section('content')
Шаблоны
@can('create-template')
<a href="{{route('admin.templates.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
@endcan
<hr>
@if($templates->count())
{{$templates->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        @foreach($templates as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td width="150px">
                    <a href="{{route('admin.templates.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('admin.templates.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$templates->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop