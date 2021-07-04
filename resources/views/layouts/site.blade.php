<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Эколига')</title>
    <meta name="description" content="@yield('description')">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
<div class="header">
      <div class="header-top container">
        <div class="header-logo-block">
          <a href="{{route('home')}}" class="header-top_link">
            <img
              src="img/logo.png"
              alt="Логотип компании"
              class="logo-pic"
              width="73"
              height="72"
            />
          </a>
        </div>
        <div class="header-info-block">
          <div class="header-info-wrp">
            <div class="header-info_line"></div>
            <a href="tel:+88001881818" class="header-top_link tel"
              >8 (800) 188 18 18</a
            >
          </div>
          <a class="header-top_link" href="mailto:ecoliga@gmail.com">ecoliga@gmail.com</a>
          <a href="{{route('login/client')}}" class="header-top_link login">
            <img
              class="login-pic"
              src="img/login-icon.svg"
              alt="Личный кабинет"
            />
            <span class="login">Кабинет</span>
          </a>
          <div class="header-search-btn">
                    <a class="search-fcco-btn" href="{{route('codes.index')}}">Найти ФККО</a>
          </div>
        </div>
      </div>
        <div class="menu-burger__header">
          <span></span>
      </div>

      @include('components.top-menu')
      <div class="services-block container">
        <div class="services-block-wrp">
          <span class="services-title">
            Утилизация <br> промышленных и пищевых<br>отходов
          </span>
          <div class="services-btns">
            <div class="our-services">
              <a href="#" class="our-services btn">Наши услуги</a>
            </div>
            <div class="contact-us">
              <a href="#" class="our-contact-us btn">Связаться с нами</a>
            </div>
          </div>
        </div>
                 <span class="services-subtitle">
            Сбор, вывоз и утилизация <br />
            опасных отходов I-V классов по всей России
          </span>
        <div class="header-pic">
          <img class="imka" 
            src="img/header-circe.svg"
            alt="Circe"
            width="355"
            height="355"
          />
          <img class="illustrat" src="img/new2-17 1.svg">
          <img class="illustrat_krug" src="img/Ellipse 164.svg">
        </div>
      </div>
    </div>
    <main class="main">
        @yield('content')
    </main>
    <footer class="footer">
  <div class="footer-part">
  <div class="footer-block container">
    <div class="footer-top">
      <div class="footer-logo-block">
        <a href="#" class="footer-logo-link">
          <img
            src="img/logo.png"
            alt="Логотип компании"
            class="logo-pic"
            width="136"
            height="138"
          />
        </a>
      </div>
      @include('components.bottom-menu')
      <div class="footer-top_list">
        <span class="footer-top_list_title">Контакты</span> 
        <span class="footer-top_link">г. Москва <br> улица Василия Каменского 3</span>
        <a href="tel:+ 79223221332" class="footer-top_link tel">8 (800) 188 18 18</a>
        <a href="mailto:ecoliga@gmail.com" class="footer-top_link">ecoliga@gmail.com</a>
      </div>
      
    </div>
  </div>
</div>
<div class="footer-part">
  <div class="footer-bottom container">
    <span class="footer-copyright">© 2021 Эколига все права защищены.</span>
    <a href="#" class="confid-link">Политика конфиденциальности
    </a>
    <div class="bpump-block">
      <span class="bpump-txt">Сделано с любовью в </span>
      <a href="https://bpump.ru/" class="bpump-link">bpump.ru</a>
    </div>
  </div>
</div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="js/main.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          600: {
            slidesPerView: 1,
            spaceBetween: 20,
          },
          1000: {
            slidesPerView: 3,
            spaceBetween: 40,
          },

        },
       navigation: {
          nextEl: '.prev_a',
          prevEl: '.next_a',
        }, 
      });
    </script>
    <script type="text/javascript">
       $('a[href^="#"]').click(function(){ 
        let anchor = $(this).attr('href');  
        $('html, body').animate({scrollTop:  $(anchor).offset().top}, 600);
        });
    </script>
    <script>

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
  </body>
</html>    