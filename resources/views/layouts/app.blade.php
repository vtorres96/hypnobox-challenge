<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HYPNOAgenda') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script defer src="{{url('js/app.js')}}"></script>
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-dark bg-primary">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-cubes pr-2 fs-25"></i>
                    HYPNOAgenda
                </a>
                @guest
                    <ul class="navbar-nav flex-row mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('welcome') }}" class="nav-link pr-2 text-white">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link pr-2 text-white">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link pr-2 text-white">{{ __('Cadastro') }}</a>
                            </li>
                        @endif
                    </ul>
                @else
                    <ul class="navbar-nav flex-row mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('contacts') }}" class="nav-link pr-2 text-white">Contatos</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-row ml-auto">
                        <li class="nav-item">
                            <a class="nav-link pr-4 text-white" href="">
                                Olá, {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Sair') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @endguest
            </nav>
        </header>
        <main class="container my-5">
            @yield('content')
        </main>
    </div>
</body>
</html>
