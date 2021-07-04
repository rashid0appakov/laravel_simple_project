@extends('layouts.site_inside', ['right' => false])

@section('bread')
<div class="breadcrumbs container">
    <a class="breadcrumbs-link" href="{{route('home')}}">Главная /</a>
    <span class="breadcrumbs-page">Контакты</span>
</div>
@stop

@section('content')

<div class="faq-block-wrp about">
        <div class="faq-block container">
          <span class="faq-block_title">
            <img class="faq-block_title_svg" src="img/question-mark-3 1.svg">
          НАШИ КОНТАКТЫ:</span>

          <div class="faq-block_list kontakts">
            <div class="kontaks_details">
            
              <p> <div class="ikonka_kontakts">
                  <img src="img/telefon.svg" alt="">
                  </div> <b>Телефон:</b>
              +7 (499) 354 67 78</p>
            </div>
            <div class="kontaks_details">
               
              <p> <div class="ikonka_kontakts mob">
                  <img src="img/mob.svg" alt="">
                  </div>
              <b>Моб.</b>
               +7 929 123 56 12</p>
            </div>
            <div class="kontaks_details">
              <p><div class="ikonka_kontakts">
                  <img src="img/mail.svg" alt="">
                  </div><b>E-mail:</b>
              info@ecoliga.ru</p>
            </div>
      <div class="kontaks_details">
        
        <p> <div class="ikonka_kontakts geo">
                  <img src="img/geo.svg" alt="">
                  </div><b>Адрес:</b> г. Москва, Шоссе Космонавтов 37</p>
      </div>
            <div class="kontaks_details">
              
              <div class="ikonka_kontakts time">
                  <img src="img/time.svg" alt=""></div><b>Время работы:</b><br>
                </div>
            <div>
            Понедельник - 09:00-18:00;<br>
            Вторник - 09:00-18:00;<br>
              Среда - 09:00-18:00;<br>
            Четверг - 09:00-18:00;<br>
            Пятница - 09:00-17:00;<br>
            Сб.-Вс. - Выходной<br>
          </div>
          </div>
          <div class="faq-block-img">
          <iframe src="https://yandex.ru/map-widget/v1/-/CCUeB2SWCA" width="100%" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
          </div>
        </div>
      </div>
          <div class="questions-block-wrp">
        <div class="questions-block container">
          <span class="questions-block_title">
            <img class="questions-block_title_svg" src="img/question-mark-2 1.svg">
            ответьте на 3 вопроса, чтобы мы <br />
            могли рассчитать стоимость утилизации:
          </span>
          <form class="questions-block-form" action="#">
            <label class="questions-block_label">
              <span class="question-text">
                Вопрос номер один желательно в две строчки ?
              </span>
              <input
                class="questions-block_input"
                type="text"
                name="text"
                id=""
                placeholder="Ваш ответ"
              />
            </label>

            <label class="questions-block_label">
              <span class="question-text">
                Вопрос номер один желательно в две строчки ?
              </span>
              <input
                class="questions-block_input"
                type="text"
                name="text"
                id=""
                placeholder="Ваш ответ"
              />
            </label>
            <label class="questions-block_label">
              <span class="question-text">
                Вопрос номер один желательно в две строчки ?
              </span>
              <input
                class="questions-block_input"
                type="text"
                name="text"
                id=""
                placeholder="Ваш ответ"
              />
            </label>
            <button class="questions-block_btn btn" type="submit">
              Получить КП
            </button>
          </form>
        </div>
      </div>
          <div class="faq-block-wrp">
        <div class="faq-block container">
          <span class="faq-block_title">
            <img class="faq-block_title_svg" src="img/question-mark-3 1.svg">
          Часто задаваемые вопросы:</span>

          <div class="faq-block_list">
            <details class="faq-block__item">
              <summary>Консультация</summary>
              <p>
                Наша компания является основным партнёром крупных
                производственных компании России.
              </p>
            </details>
            <details class="faq-block__item">
              <summary>Какие виды отходов мы перерабатываете?</summary>
              <p>
                Наша компания является основным партнёром крупных
                производственных компании России.
              </p>
            </details>
            <details class="faq-block__item">
              <summary>Что такое экология ?</summary>
              <p>
                Наша компания является основным партнёром крупных
                производственных компании России.
              </p>
            </details>
            <details class="faq-block__item">
              <summary>Зачем мы переробатываем мусор ?</summary>
              <p>
                Наша компания является основным партнёром крупных
                производственных компании России.
              </p>
            </details>
            <details class="faq-block__item">
              <summary>Какаие виды транспорта у нас есть ?</summary>
              <p>
                Наша компания является основным партнёром крупных
                производственных компании России.
              </p>
            </details>
          </div>
          <div class="faq-block-img">
            <img
              src="img/1 1.svg"
              alt="Photo"
              class="faq-block-pic"
            />
          </div>
        </div>
      </div>
          <div class="feedback-form-wrp">
      <div class="feedback-form-block container">
        <div class="feedback-form-content">
          <span class="feedback-form-title">
            <img class="feedback-form-title_svg" src="img/contact-book 1.svg">
            Как с нами связаться ?
          </span>
          <span class="feedback-form-txt">
            Укажите код или название отхода <br />
            И мы свяжемся с вами в самое ближайшее время.
          </span>
          <div class="forms-block feedback">
            <form class="feedback-form" action="{{route('leads.store')}}" method="post">
              <p><input
                class="contact-form_input feedback-input"
                type="text"
                name="name"
                placeholder="Ваше имя"
              /></p>
              <p><input
                class="contact-form_input feedback-input"
                type="email"
                name="email"
                placeholder="Ваш email"
              /></p>
              <p>
                <input
                class="contact-form_input feedback-input"
                type="text"
                name="phone"
                placeholder="Ваше сообщение:"
              />
              </p>
              <p><button class="feedback-btn btn" type="submit">Отправить</button></p> 
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
