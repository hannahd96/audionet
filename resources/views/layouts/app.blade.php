<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href = "css/main.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container" style="margin-top:12.5px; margin-bottom:12.5px;">
                <a class="navbar-brand" href="{{ url('/home') }}" style="color:white !important">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                 <!--  <a href="{{ url('/home') }}"> 
                        <ul class="navbar-nav mr-auto">
                            <div id="logo_left_part">
                                <img src="images/audioNetlogo.png" alt="logo" style="width:31px; 
                                                                                    height:27px; 
                                                                                    padding:0px; 
                                                                                    margin:0px 5px 0px 0px;">
                            </div>
                            <div id="logo_middle_part">
                                <img src="images/black_line.png" alt="black_line" style="height:30px; 
                                                                                        width:20px;
                                                                                        margin:0px 5px 0px 5px;">                         
                            </div>
                            <div id="logo_right_part">
                                <img src="images/word_logo.png" alt="word_logo" style="height:20px;
                                                                                        width:80px;">
                            </div>
                        </ul>
                    </a> -->
                    
          
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:white !important">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:white !important">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a href="{{ url('/profile') }}" style="position:relative; padding-left:50px; color:white !important;">
                                    <img src="uploads/avatars/{{ Auth::user()->avatar }}" style="width:30px; height:30px; position:absolute; left:10px; border-radius:50%;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
