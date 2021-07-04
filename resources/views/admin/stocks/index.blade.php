@extends('layouts.admin')

@section('content')
Склады
@can('create-stock')
<a href="{{route('admin.stocks.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
@endcan
<hr>
@if($stocks->count())
{{$stocks->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>Название</th>
            <th>Адрес</th>
            <th>Емкость</th>
            <th>Действия</th>
        </tr>
        @foreach($stocks as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->filled}}/{{$item->size}}</td>
                <td width="150px">
                    <a href="{{route('admin.stocks.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('admin.stocks.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$stocks->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop