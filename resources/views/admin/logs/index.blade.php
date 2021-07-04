@extends('layouts.admin')

@section('content')
<h1>История действий пользователей</h1>
<hr>
@if($logs->count())
{{$logs->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>Время</th>
            <th>Пользователь</th>
            <th>Действие</th>
        </tr>
        @foreach($logs as $item)
            <tr>
                <td>{{$item->created_at->format('d.m.Y H:i')}}</td>
                <td>@if($item->user_id) {{$item->user->name}} @endif</td>
                <td>{{$item->text}}</td>
            </tr>
        @endforeach
    </table>
</div>
{{$logs->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop