<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Панель администратора</title>
    <script src="/vendor/tinymce/tinymce.min.js"></script>
    <script src="/vendor/tinymce/langs/ru.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <main class="py-3">
                <div class="row">
                    <div class="col-md-2">
                        <div class="list-group">
                            <a href="{{route('home')}}" class="list-group-item list-group-item-action py-1">На сайт</a>
                            @can('view-lead')<a href="{{route('admin.leads.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.leads.*')) active @endif">Заявки</a>@endcan
                            @can('view-order')<a href="{{route('admin.orders.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.orders.*')) active @endif">Заказы</a>@endcan
                            @can('view-user')<a href="{{route('admin.users.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.users.*')) active @endif">Пользователи</a>@endcan
                            @can('view-client')<a href="{{route('admin.clients.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.clients.*')) active @endif">Клиенты</a>@endcan
                            @can('view-company')<a href="{{route('admin.companies.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.companies.*')) active @endif">Организации</a>@endcan
                            @can('view-stock')<a href="{{route('admin.stocks.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.stocks.*')) active @endif">Площадки</a>@endcan
                            <a href="{{route('admin.news.index')}}" class="list-group-item list-group-item-action py-1">Новости</a>
                            @can('view-code')<a href="{{route('admin.codes.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.codes.*')) active @endif">Классы ФККО</a>@endcan
                            <!-- @can('view-template')<a href="{{route('admin.templates.index')}}" class="list-group-item py-1 @if(Route::is()) active @endif">Шаблоны</a>@endcan -->
                            @can('view-role')<a href="{{route('admin.roles.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.roles.*')) active @endif">Роли</a>@endcan
                            @can('view-log')<a href="{{route('admin.logs.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.logs.*')) active @endif">Логи</a>@endcan
                            <div class="divider"></div>
                            @can('view-dust_category')<a href="{{route('admin.dust_categories.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.dust_categories.*')) active @endif">Категории отходов</a>@endcan
                            @can('view-dust')<a href="{{route('admin.dusts.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.dusts.*')) active @endif">Отходы</a>@endcan
                            <div class="divider"></div>
                            <a href="{{route('logout')}}" class="list-group-item list-group-item-action py-1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header text-left">
                               
                            </div>
                            <div class="card-body">
                                @if(session()->has('success'))
                                    <div class="d-block mb-3 alert alert-success">{{session('success')}}</div>
                                @elseif(session()->has('danger'))
                                    <div class="d-block mb-3 alert alert-danger">{{session('danger')}}</div>
                                @elseif(session()->has('warning'))
                                    <div class="d-block mb-3 alert alert-warning">{{session('warning')}}</div>
                                @endif
                                @yield('content')    
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            tinymce.init({
                selector: '.editor',
                menubar:false,
                statusbar: false,
                height: 500,
                media_live_embeds: true,
                media_poster: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste imagetools wordcount'
                ],
                toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fullscreen',
            });
        })
    </script>
</body>
</html>
