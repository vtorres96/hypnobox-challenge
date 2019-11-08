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
</head>
<body>
    <div id="app">
        <header class="bg-primary">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <i class="fas fa-cubes"></i>
                    HypnoAgenda
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    @guest
                        <ul class="navbar-nav flex-row mr-auto p-0">
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link pr-2 text-white">{{ __('Cadastro') }}</a>
                                </li>
                            @endif
                        </ul>
                        <ul class="navbar-nav flex-row ml-auto p-0">
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link pr-2 text-white">{{ __('Minha Conta') }}</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav flex-row mr-auto text-white">
                            <li class="nav-item">
                                <a href="{{ route('contacts-index') }}" class="nav-link pr-2 text-white">Contatos</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav flex-row ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Olá, {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Editar Perfil</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @endguest
                </div>
            </nav>
        </header>
        <main class="container my-5">
            @yield('content')
        </main>
    </div>
</body>
</html>
