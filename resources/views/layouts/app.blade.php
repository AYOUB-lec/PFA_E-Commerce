<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--this one is for my features :) -->
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom_css/style.css') }}" rel="stylesheet">
</head>
<body style="background-color:aliceblue;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand img-resize" href="{{ url('/') }}">
                  {{-- {{ config('app.name', 'Laravel') }} --}}
                  <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto left-nav">
                      
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        
                        @guest

                            <li class="nav-item"><a class="nav-link" href="{{ route('page.first') }}">Home</a></li><!-- index landingController -->
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Products</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Contact</a></li> 
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>

                            @endif

                        @else
                        @if(auth()->guard("admin")->check())
                        {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ auth()->guard("admin")->user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route("admin.index") }}">
                                    Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                    {{ __('Déconnexion') }}
                                </a>
                            </div>
                        </li> --}}
                        <li class="nav-item"><a class="nav-link" href="{{ route("admin.index") }}">Dashboard</a></li> 
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.logout') }}">{{ __('Logout') }}</a></li> 
                        <li class="nav-item"><a class="nav-link" href="#"> <strong>{{ auth()->guard("admin")->user()->name}} </strong></a></li> 

                    @else
                        
                        <li class="nav-item"><a class="nav-link" href="{{ route('page.first') }}">Home</a></li><!-- index landingController -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Contact</a></li> 
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endif
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-8 mx-auto my-4">
                @include('layouts.alerts')
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
        
    </div>
</body>
</html>
