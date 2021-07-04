<nav class="header-nav container">
    <div class="header-nav_main-line"></div>
    @foreach($categories as $item)
    <div class="header-nav_line">
        <a href="{{route('dust_categories.show', $item->slug)}}" class="header-nav_link">{{$item->name}}</a>
    </div>
    @endforeach
    <div class="dropdown header-nav_line">
        <button onclick="myFunction()" class="header-nav_link dropbtn">Услуги</button>
        <div id="myDropdown" class="dropdown-content">
            <a href="/accumulation/">Накопления</a>
            <a href="/disinfection/">Обеззараживание</a>
            <a href="/transportation/">Транспортирование</a>
            <a href="/recycling/">Переработка отходов</a>
            <a href="/utilization/">Утилизация</a>
        </div>
    </div>
    <div class="header-nav_line">
    <a href="/news/" class="header-nav_link">Новости</a>
    </div>
    <div class="header-nav_line">
    <a href="/about/" class="header-nav_link">О компании</a>
    </div>
    <div class="header-nav_line">
    <a href="/contacts/" class="header-nav_link">Контакты</a>
    </div>
</nav>

