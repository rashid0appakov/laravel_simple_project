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
                <a href="{{route('dusts.show', [$category->slug, $item->slug])}}" class="articles-link @if(Route::is('dusts.show') && $dust->id == $item->id) selected @endif">{{$item->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <article class="article-content">
        <span class="article-content_title">{{$dust->name}}</span>
        <div class="article-content_text">
            {!!$dust->text!!}
        </div>
    </article>
</div>
@stop