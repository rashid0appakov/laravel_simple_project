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
                        <div class="card">
                            <div class="card-header">Меню</div>
                            <div class="card-body">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a href="{{route('home')}}" class="nav-link">На сайт</a></li>
                                    <li class="nav-item-divider"></li>
                                    <li class="nav-item"><a href="{{route('client.orders.index')}}" class="nav-link">Мои заказы</a></li>
                                    <li class="nav-item-divider"></li>
                                    <li class="nav-item">
                                        <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="card">
                        <div class="card-header text-left">
                            {{auth()->user()->name}}
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
