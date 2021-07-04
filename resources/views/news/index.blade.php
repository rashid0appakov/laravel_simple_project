@extends('layouts.site_inside', ['right' => false])

@section('bread')
<div class="breadcrumbs container">
    <a class="breadcrumbs-link" href="{{route('home')}}">Главная /</a>
    <span class="breadcrumbs-page">Новости</span>
</div>
@stop

@section('content')

<div class="search-block container">

@foreach($news as $new)


<div class="search-result-article">
  <span class="search-result-article_title"
    >{{$new->title}}</span
  >
  <p class="search-result-article_text">
     {{$new->text}}
  </p>
  <a href="/news/{{ $new->id }}" class="search-result-article_details btn">Подробнее</a>
</div>

@endforeach

</div>

<div class="feedback-form-wrp">
<div class="feedback-form-block container">
  <div class="feedback-form-content">
    <span class="feedback-form-title"> Как с нами связаться ? </span>
    <span class="feedback-form-txt">
      Укажите код или название отхода <br />
      И мы свяжемся с вами в самое ближайшее время.
    </span>
    <div class="forms-block feedback">
      <form class="feedback-form">
        <p>
          <input
            class="contact-form_input feedback-input"
            type="text"
            placeholder="Ваше имя"
          />
        </p>
        <p>
          <input
            class="contact-form_input feedback-input"
            type="email"
            placeholder="Ваш email"
          />
        </p>
        <p>
          <input
            class="contact-form_input feedback-input"
            type="text"
            placeholder="Ваше сообщение:"
          />
        </p>
        <p>
          <button class="feedback-btn btn" type="submit">
            Отправить
          </button>
        </p>
      </form>
    </div>
  </div>
  <div class="feedback-form-pic">
    <img
      class="contact-form__img feedback"
      src="img/Visual-data-concept-illustration-02--05 1.svg"
      alt="Photo"
    />
  </div>
</div>
</div>

@endsection