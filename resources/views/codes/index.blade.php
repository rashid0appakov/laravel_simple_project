@extends('layouts.site_inside', ['right' => false])

@section('bread')
<div class="breadcrumbs container">
    <a class="breadcrumbs-link" href="{{route('home')}}">Главная /</a>
    <span class="breadcrumbs-page">Классификатор отходов</span>
</div>
@stop

@section('content')
<div class="search-block container">
        <span class="search-query">Классификатор отходов</span>
        
        @livewire('search')

      </div>
@endsection
