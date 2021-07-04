@extends('layouts.site_inside', ['right' => false])


@section('bread')
<div class="acc-wrp-bg">
<div class="breadcrumbs container">
    <a class="breadcrumbs-link" href="{{route('home')}}">Главная /</a>
    <span class="breadcrumbs-page">Накопление</span>
</div>
@stop

@section('content')

        

            <section class="services-info container">
                <span class="services-info__title">Накопление</span>
                <p class="services-info__text">Современная экологическая ситуация оставляет желать лучшего из-за
                    большого количества мусора, несанкционированных свалок и стихийных полигонов. Захоронение и
                    складирование опасных отходов наносит серьезный ущерб всем компонентам природной среды:
                    поверхностным и грунтовым водам, почве, видовому разнообразию флоры и фауны, атмосфере. Это, в свою
                    очередь, отражается на здоровье людей. Чтобы снизить негативную нагрузку на экологическую систему,
                    государство стремится увеличить объем мусора, подлежащий утилизации и обезвреживанию. Сегодня
                    активно внедряется обработка отходов, которая позволяет повторно использовать мусор для производства
                    новых товаров и минимизировать объем токсичных для природы и человека веществ, подлежащих
                    захоронению на полигонах. </p>
            </section>
        </div>
        <div class="services-kinds container">
            <div class="services-kinds-part">
                <span class="services-kinds__title">Виды накопления</span>
                <p class="services-kinds__text">СНакопление и хранение больших объемов отходов 1-4 классов приводит к
                    загрязнению территории предприятия и подвергает опасности здоровье работников, а неправильное
                    обезвреживание и утилизация таких веществ грозит экологической катастрофой. Поэтому опасные отходы
                    вызывают пристальное внимание контролирующих органов, которые следят за тем, чтобы обращение с ними
                    осуществлялось в соответствии с утвержденными правилами.
                </p>
                <p class="services-kinds__text">Залог успешной работы в области обращения с отходами это правильный
                    выбор
                    организации, которая будет
                    осуществлять обезвреживание отходов, ведь собственник несет ответственность за правильность и
                    своевременность их утилизации.</p>
                <p class="services-kinds__text">Эколига быстро и в полном объеме выполнит следующие виды работ:</p>
                <ul class="services-kinds_list">
                    <li class="services-kinds_list__item">Предварительная обработка и подготовка отходов к
                        обезвреживанию;
                    </li>
                    <li class="services-kinds_list__item">Транспортирование отходов к месту обезвреживания;</li>
                    <li class="services-kinds_list__item">Обезвреживание отходов 1-4 классов опасности термическим и
                        другими
                        методами;</li>
                    <li class="services-kinds_list__item">Предоставление необходимой экологической сопроводительной
                        документации.</li>
                </ul>
            </div>
            <div class="services-kinds-part">
                <img
                    class="services-kinds-img"
                    src="img/services-kinds-img.jpg"
                    alt="excavator"
                >
            </div>
        </div>
        <div class="text-block-wrp container"></div>
        <div class="text-block">
            <div class="text-block-parts container">
                <div class="text-block-part">
                    <p class="text-block-part_text">
                        Вам не придется заключать договоры с разными организациями, чтобы обеспечить
                        обезвреживание всех
                        отходов, мы примем их
                        все. Работаем с большинством видов отходов 1-4 классов опасности, включенных в ФККО
                        и производим
                        обезвреживание разными
                        методами (термическим, механическим, биологическим, химическим, физико-химическим).
                    </p>
                    <p class="text-block-part_text">
                        Мы гарантируем соблюдение норм экологического законодательства и требований
                        безопасности. В наличии
                        необходимые лицензии
                        и разрешения на комплекс услуг по обращению с отходами: сбор, транспортирование,
                        обработку,
                        утилизацию и обезвреживание
                        отходов. Сотрудники, допущенные к работе с опасными отходами вовремя проходят
                        специальное обучение в
                        этой области,
                        инструктажи по соблюдению требований безопасности и медицинское освидетельствование.
                    </p>
                </div>
                <div class="text-block-part">
                    <p class="text-block-part_text">
                        Транспортируем любые видов опасных отходов, т.к. в нашем автопарке есть необходимый
                        автотранспорт и
                        спецтехника.
                    </p>
                    <p class="text-block-part_text">
                        Обеспечим быстрое выполнение заявки, выезд машины возможен в день обращения.
                    </p>
                    <p class="text-block-part_text">
                        Работаем на территории Москвы, Московской области и в других регионах РФ.
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
        <div class="text-block">
            <div class="text-block-parts container">
                <div class="text-block-part">
                    <img
                        src="img/sorting-plastic.jpg"
                        alt="workers sorting plastic"
                        class="text-block-part_img"
                    >
                </div>
                <div class="text-block-part">
                    <span class="text-block-part_title">
                        Заголовок
                    </span>
                    <p class="text-block-part_text">
                        Группа компаний «ЭкоЛига» организовывает транспортировку отходов всех классов ФККО. Доставляем
                        отходы безопасно, по лицензии. Транспортировка промышленных, химических и пищевых отходов
                        тщательно контролируется со стороны служб экологической безопасности. Перевозка должна
                        осуществляться строго по лицензии, и полным набором сопроводительных документов с информационной
                        отметкой на самом транспортном средстве. Мы поможем Вам организовать и доставить практически
                        любой класс отхода до нужного места хранения или утилизации.
                    </p>
                </div>
            </div>
        </div>
        <div class="text-content-wrp">
            <div class="text-content container">
                <span class="text-content_title">Заголовок второстпенный</span>
                <div class="text-content-part">
                    <p class="text-content_text">
                        Стихийные свалки, которые периодически образуются в районах Москвы — серьезная угроза для
                        экологии. Своевременный вывоз и утилизацию отходов способствуют сохранению окружающей среды,
                        облагораживают дворы и проезжие части. Для препятствия появлению очагов опасности, в разрешенных
                        местах устанавливаются контейнеры и бункеры для сбора бытового мусора.
                    </p>
                    <p class="text-content_text">
                        Промышленные предприятия нуждаются в таких услугах. Помимо вывоза и утилизации ТБО и
                        производственных отходов, обязательно правильное уничтожение люминесцентных ламп, которые
                        используются на всех заводах, фабриках и частных производствах. Строительные работы также
                        сопряжены со скоплением различных отходов. В местах застройки устанавливаются объемные бункеры
                        для сбора.
                    </p>
                </div>
                <div class="text-content-part">
                    <p class="text-content_text">
                        Каждый район столицы имеет свои особенности и проблемы в области скопления нежелательного
                        мусора. Мы стараемся сделать город чище, используя современное оборудование, надежную технику и
                        наработанные системы. Квалифицированные специалисты подбирают оптимальные средства для каждой
                        ситуации. Регулярно обновляемый автопарк гарантирует безаварийность работ.
                    </p>
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

        