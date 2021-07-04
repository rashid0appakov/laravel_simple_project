@extends('layouts.site_inside', ['right' => false])


@section('content')

@section('bread')
<div class="breadcrumbs container">
    <a class="breadcrumbs-link" href="{{route('home')}}">Главная /</a>
    <a class="breadcrumbs-link" href="/news/">Новости /</a>
    <span class="breadcrumbs-page">{{$news->title}}</span>
</div>
@stop

<div class="articles-wrp container">
 
      <article class="article-content" style="width: 100%">
          <span class="article-content_title">{{$news->title}}</span>
          <div class="article-content_text">
            <p>
            {{$news->text}}
            </p>
            </div>
    
      </article>

</div>

@endsection
