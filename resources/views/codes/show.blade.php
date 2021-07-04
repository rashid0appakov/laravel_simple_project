@extends('layouts.site_inside', ['right' => false])


@section('content')

@section('bread')
<div class="breadcrumbs container">
    <a class="breadcrumbs-link" href="{{route('home')}}">Главная /</a>
    <a class="breadcrumbs-link" href="/codes/">Классификатор отходов /</a>
    <span class="breadcrumbs-page">{{$code->name}}</span>
</div>
@stop

      <div class="search-block container">
        <span class="search-query">Классификатор отходов</span>
        <form class="search-form">
          <input
            class="search-input contact-form_input"
            type="text"
            placeholder="Начните ввод кода или название отхода"
          />
          
          <button class="search-btn btn" type="submit">Найти</button>
        </form>
        <section class="article-section">
          <div class="article-title-wrp">
            <span class="article-title"
              >{{$code->name}}</span
            >
          </div>
          <div class="article-txt-wrp">
            <p class="article-text">
              Наименование отхода: {{$code->name}} Код ФККО: {{$code->code}} Вид
              деятельности: {{$code->types}} Класс отходов:
              fghfghfghfggdfg Список кодов ФККО: 
            </p>
          </div>
          <div class="article-info-wrp">
            <span class="article-info_title">Наименование отхода: </span>
            <p class="article-info_txt">
            {{$code->name}}
            </p>
            <span class="article-info_title">Код ФККО</span>
            <p class="article-info_txt">{{$code->code}}</p>
            <span class="article-info_title">Вид деятельности</span>
            <p class="article-info_txt">
              {{$code->types}}
            </p>
            <span class="article-info_title">Класс отходов</span>
            <p class="article-info_txt">IV</p>
            <span class="article-info_title"
              >Агрегатное состояние и физическая форма</span
            >
            <p class="article-info_txt">
              Смесь твердых материалов (включая волокна) и изделий
            </p>
            <span class="article-info_title">Список кодов ФККО</span>
            <p class="article-info_txt">
            <?php echo chunk_split($code['code'], 1, ' ')?>, <?php echo chunk_split($code['code'], 2, ' ')?>, {{$code->code}} 
            </p>
          </div>
        </section>
      </div>
      <div class="questions-block-wrp details-page">
        <div class="questions-block container">
          <span class="questions-block_title details-page">
            ответьте на 3 вопроса, чтобы мы <br />
            могли рассчитать стоимость утилизации:
          </span>
          <form class="questions-block-form" action="#">
            <label class="questions-block_label">
              <span class="question-text details-page">
                Вопрос номер один желательно в две строчки ?
              </span>
              <input
                class="questions-block_input details-page"
                type="text"
                name="text"
                id=""
                placeholder="Ваш ответ"
              />
            </label>

            <label class="questions-block_label">
              <span class="question-text details-page">
                Вопрос номер один желательно в две строчки ?
              </span>
              <input
                class="questions-block_input details-page"
                type="text"
                name="text"
                id=""
                placeholder="Ваш ответ"
              />
            </label>
            <label class="questions-block_label">
              <span class="question-text details-page">
                Вопрос номер один желательно в две строчки ?
              </span>
              <input
                class="questions-block_input details-page"
                type="text"
                name="text"
                id=""
                placeholder="Ваш ответ"
              />
            </label>
            <button class="questions-block_btn details-page btn" type="submit">
              Получить КП
            </button>
          </form>
        </div>
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
