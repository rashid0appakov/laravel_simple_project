@extends('layouts.site_inside', ['right' => false])

@section('bread')
<div class="util-wrp-bg">
    
<div class="breadcrumbs container">
<a class="breadcrumbs-link" href="{{route('home')}}">Главная /</a>
<span class="breadcrumbs-page">Утилизация</span>
</div>
@stop

@section('content')

            <section class="services-info container">
                <span class="services-info__title">Утилизация отходов в Москве</span>
                <p class="services-info__text">Профессиональная утилизация и переработка отходов по лицензии. Наша
                    компания занимается утилизацией промышленных, химических и пищевых отходов строго по лизании. В
                    нашем распоряжении собственный автопарк специально подготовленной техники для безопасной утилизации
                    жидких и твёрдых типов отходов.
                    «ЭкоЛига» обеспечивает официальную и безопасную утилизацию ваших отходов уже сегодня. Для
                    консультации и оформления договора, свяжитесь с нашими специалистами
                </p>
                <div class="statistics-list">
                    <div class="statistics-list_item">
                        <span class="statistics-list_item__sum">6 лет</span>
                        <span class="statistics-list_item__text">на рынке</span>
                    </div>
                    <div class="statistics-list_item">
                        <span class="statistics-list_item__sum">
                            <
                                9874</span>
                                <span
                                class="statistics-list_item__text"
                            >завершенных заказов
                        </span>
                    </div>
                    <div class="statistics-list_item">
                        <span class="statistics-list_item__sum">12</span>
                        <span class="statistics-list_item__text">своих предприятий</span>
                    </div>
                    <div class="statistics-list_item">
                        <span class="statistics-list_item__sum">30</span>
                        <span class="statistics-list_item__text">единиц своей техники</span>
                    </div>
                </div>
            </section>
        </div>

        <div class="services-kinds container">
            <div class="services-kinds-part">
                <span class="services-kinds__title">Заголовок</span>
                <p class="services-kinds__text">Для обеспечения безопасности окружающей среды необходимо вести
                    организованный учет всех остатков деятельности как человека, так и производства. С этой целью был
                    разработан ФККО, который
                    регламентирует работу предприятий в области списания материалов, утративших свою функциональность,
                    пришедших в непригодность, требующих замены.
                </p>
                <div class="">
                    <a
                        href="#"
                        class="services-kinds__link"
                    >Узнать больше</a>
                </div>
            </div>
            <div class="services-kinds-part">
                <img
                    class="services-kinds-img"
                    src="img/recycling.jpg"
                    alt="recycling"
                >
            </div>
        </div>

        <div class="text-block">
            <div class="text-block-parts container">
                <div class="text-block-part">
                    <img
                        src="img/global.svg"
                        alt="ecology"
                        class="text-block-part_img"
                    >
                </div>
                <div class="text-block-part">
                    <ul class="text-block-part_list">
                        <li class="text-block-part_list__item">Бесплатно консультируем, определяем класс
                            отходов и их объем.</li>
                        <li class="text-block-part_list__item">Оформляем договор и готовим сопроводительные
                            документы
                            для транспортировки.</li>
                        <li class="text-block-part_list__item">
                            Производим забор отходов, безопасно доставляем до пункта утилизации или хранения.
                        </li>
                        <li class="text-block-part_list__item">
                            Предаем закрывающие документы.
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="services-kinds container">
            <div class="services-kinds-part">
                <span class="services-kinds__title">Утилизируем все!
                </span>
                <p class="services-kinds__text">Профессиональная утилизация и переработка отходов по лицензии. Наша
                    компания занимается утилизацией промышленных, химических и пищевых отходов строго по лизании. В
                    нашем распоряжении собственный автопарк специально подготовленной техники для безопасной утилизации
                    жидких и твёрдых типов отходов.
                    «ЭкоЛига» обеспечивает официальную и безопасную утилизацию ваших отходов уже сегодня. Ля
                    консультации и оформления договора, свяжитесь с нашими специалистами

                </p>
                <span class="services-kinds__title">Промышленные отходы</span>
                <p class="services-kinds__text">Современные требования экологической безопасности предъявляют ряд мер по
                    утилизации промышленных и химических отходов. Забор, транспортировка и утилизация производится под
                    строгим контролем и только при наличии всех необходимых документов. Спецтехника, которая производит
                    вывоз отхода имеет специализированные отметки и полный набор документов. Утилизация производится на
                    специально предназначенных предприятиях группы компаний «ЭкоЛига» в Московской областях. В нашем
                    распоряжении более десяти специально отведенных площадок утилизации и собственный завод по
                    переработке промышленных, химических и бытовых отходов.
                </p>
            </div>
            <div class="services-kinds-part">
                <img
                    class="services-kinds-img"
                    src="img/workers.jpg"
                    alt="recycling"
                >
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