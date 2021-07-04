@extends('layouts.site_inside', ['right' => false])

@section('bread')
<div class="recyc-wrp-bg">
    
<div class="breadcrumbs container">
    <a class="breadcrumbs-link" href="{{route('home')}}">Главная /</a>
    <span class="breadcrumbs-page">Переработка отходов</span>
</div>
@stop

@section('content')

        

            <section class="services-info container">
                <span class="services-info__title">Переработка отходов
                </span>
                <p class="services-info__text">В связи с увеличением производственных мощностей, ростом населения,
                    планета столкнулась с проблемой загрязнения, которую нужно срочно решать. Чтобы мир не превратился в
                    огромную свалку, разрабатываются методики для борьбы с размножением мусорных масс. К числу таких
                    методов относится вторичная переработка отходов, которую называют рециклингом. Такая операция
                    является повторным использованием отработанного сырья и запуском его в производство. Как правило,
                    для данных целей используют бумагу, пластмассу, стекло, ткань и железо.
                </p>
            </section>
        </div>

        <div class="services-kinds container">
            <div class="services-kinds-part">
                <span class="services-kinds__title">Обработка отходов: способы,
                    нормативы, документация
                    для регулировки процесс</span>
                <p class="services-kinds__text">Вторичная переработка отходов производства для дальнейшего использования
                    является стремительно набирающим обороты процессом во всем мире. На территории Российской Федерации
                    такое направление считается новым и только начинает осваиваться. Актуальность технологии вызывает
                    возможная экономия, которую можно получить, если пользоваться вторсырьем, а не первичными
                    источниками.
                </p>
                <p class="services-kinds__text">
                    Также следует отметить, что такие техники борьбы с мусорными массами, как захоронение на полигонах,
                    сжигание — оказывают негативное воздействие на экологическую обстановку в стране, влияют на процесс
                    жизнедеятельности не только людей, но флоры с фауной. Подобные факты также заставляют многих людей
                    задумываться на тему, как можно использовать отработанный материал в благих целях. Человечеству
                    нужна система, при помощи которой можно будет сохранить окружающую природу, здоровье граждан и
                    получить дополнительную прибыль. Задумавшись обо всех этих вопросах, государство России поддержало
                    развитие рециклинга на территории страны.</p>
                <p class="services-kinds__text">Эколига быстро и в полном объеме выполнит следующие виды работ:
                </p>
            </div>
            <div class="services-kinds-part">
                <img
                    class="services-kinds-img"
                    src="img/test-tubes.jpg"
                    alt="test tubes"
                >
            </div>
        </div>

        <div class="text-block">
            <div class="text-block-parts container">
                <div class="text-block-part">
                    <p class="text-block-part_text">
                        Вторичная переработка отходов производства для дальнейшего использования является стремительно
                        набирающим обороты процессом во всем мире. На территории Российской Федерации такое направление
                        считается новым и только начинает осваиваться. Актуальность технологии вызывает возможная
                        экономия, которую можно получить, если пользоваться вторсырьем, а не первичными источниками.
                    </p>
                    <p class="text-block-part_text">
                        акже следует отметить, что такие техники борьбы с мусорными массами, как захоронение на
                        полигонах, сжигание — оказывают негативное воздействие на экологическую обстановку в стране,
                        влияют на процесс жизнедеятельности не только людей, но флоры с фауной. Подобные факты также
                        заставляют многих людей задумываться на тему, как можно использовать отработанный материал в
                        благих целях. Человечеству нужна система, при помощи которой можно будет сохранить окружающую
                        природу, здоровье граждан и получить дополнительную прибыль. Задумавшись обо всех этих вопросах,
                        государство России поддержало развитие рециклинга на территории страны.
                    </p>
                </div>
                <div class="text-block-part">
                    <p class="text-block-part_text">
                        Существуют законы, которые опираются на экологический подход к вопросу взаимодействия с мусором.
                        Согласно им, организации должны выплачивать дополнительные налоговые сборы, если не обладают
                        личной перерабатывающей системой в цехах. В качестве альтернативы им разрешается заниматься
                        утилизацией отработанного сырья самостоятельно. Повторно перерабатывать отработанные материалы с
                        производств можно прямо на территории предприятия из личных отходов.
                    </p>
                </div>
            </div>
        </div>
        <div class="contact-form-wrp">
            <div class="contact-form-block container">
                <div class="contact-form-content">
                    <span class="contact-form-title">
                        <img
                            class="contact-form-title_svg"
                            src="img/question-mark 1.svg"
                        >
                        Есть ли ваш отход в нашей лицензии?
                    </span>
                    <span class="contact-form-txt">
                        Укажите код или название отхода <br />
                        И мы свяжемся с вами в самое ближайшее время.
                    </span>
                    <div class="forms-block">
                        <form class="search-form">
                            <input
                                class="search-input contact-form_input"
                                type="text"
                                placeholder="Начните ввод кода или название отхода"
                            />
                            <button
                                class="search-btn btn"
                                type="submit"
                            >Найти</button>
                        </form>
                        <form class="tel-form">
                            <input
                                class="tel-input contact-form_input"
                                type="tel"
                                name="tel"
                                placeholder="Ваш номер телефона"
                            />
                            <input
                                class="tel-btn btn"
                                type="submit"
                                value="Отправить"
                            />
                        </form>
                    </div>
                </div>
                <div class="contact-form-pic">
                    <img
                        class="contact-form__img"
                        src="img/1 2.svg"
                        alt="Photo"
                    />
                </div>
            </div>
        </div>
        <div class="feedback-form-wrp">
            <div class="feedback-form-block container">
                <div class="feedback-form-content">
                    <span class="feedback-form-title">
                        <img
                            class="feedback-form-title_svg"
                            src="img/contact-book 1.svg"
                        >
                        Как с нами связаться ?
                    </span>
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
                                <button
                                    class="feedback-btn btn"
                                    type="submit"
                                >
                                    Отправить
                                </button>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="feedback-form-pic">
                    <img
                        class="contact-form__img feedback"
                        src="img/visual-data-concept-illustration.svg"
                        alt="Photo"
                    />
                </div>
            </div>
        </div>

@endsection