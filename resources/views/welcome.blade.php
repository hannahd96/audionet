<!doctype html>
<!-- unlike other pages, styling has to be done directly into this page as it doesnt extend to the app.blade file -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/main.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <title>AudioNet</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
               /* background-color: #fff;*/
                /* color: #636b6f; */
                color:white;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image: url('css/background_02.jpg'); 
                background-repeat:no-repeat; 
                background-size:cover;
            }

            #slogan{
                font-size:28px;
                letter-spacing:2px;
                
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 90px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                letter-spacing:10px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <!-- if the user is logged in.. -->
            @if (Route::has('login'))
            <!-- show these links -->
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                  
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content"  style="">
                <div class="title m-b-md">
                    AudioNet
                </div>
                <p id="slogan">Your Music, Your Network</p>          
            </div>
        </div>
    </body>
</html>