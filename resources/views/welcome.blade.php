<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Firmesa</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->


        <link rel="stylesheet" href="{{ URL::asset('css/caroussel.css') }}" />
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="app">
        <div class="container">
            
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/firmwares') }}">Firmwares</a>

                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Firmesa
                </div>
           
            <header class="jumbotron my-4">
                  <p class="lead">Crie kits de instalação para redes mesh utilizando LibreMesh
                  comunitárias e aplicações IoT.</p>
                  <a href="{{ route('gerarkit') }}" class="btn btn-primary btn-lg">Gerar Kit!</a>
                               
            </header>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                   
                    @foreach($firmwares as $firm)
                    <a href="{{ route('firmwares.show',$firm->id)}}" >
                        <div class="item">
                            <div class="pad15">
                                <p class="lead">{{$firm->manufacture}}</p>
                                <p class="lead">{{$firm->model}} {{$firm->version}}</p>
                                <img class="img-fluid" src="{{asset("logos/{$firm->logo}")}}">
                                
                                <a href="{{ route('firmwares.edit',$firm->id)}}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </a>
                    @endforeach
                        
                    </div>
                    <button class="btn btn-primary leftLst"><</button>
                    <button class="btn btn-primary rightLst">></button>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ URL::asset('js/caroussel.js') }}"></script>
    </div>
    </body>

</html>
