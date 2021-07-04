@extends('layouts.site_inside')

@section('bread')
<div class="breadcrumbs container">
    <a class="breadcrumbs-link" href="{{route('home')}}">Главная /</a>
    <span class="breadcrumbs-page"> {{$category->name}}</span>
</div>
@stop

@section('content')
<div class="articles-wrp container">
    <div class="articles-list-wrp">
        <span class="articles-list_title">Утилизация</span>
        <ul class="articles-list">
            @foreach($category->dusts as $item)
            <li class="articles-item">
                <a href="{{route('dusts.show', [$category->slug, $item->slug])}}" class="articles-link">{{$item->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@stop