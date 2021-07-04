@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        Заявки
    </div>
</div>
<hr>
<leads :user="{{auth()->user()}}"/>
@stop