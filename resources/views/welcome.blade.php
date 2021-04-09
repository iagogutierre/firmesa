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
                
                
            section.pricing {
              background: #007bff;
              background: linear-gradient(to right, #0062E6, #33AEFF);
            }

            .pricing .card {
              border: none;
              border-radius: 1rem;
              transition: all 0.2s;
              box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
            }

            .pricing hr {
              margin: 1.5rem 0;
            }

            .pricing .card-title {
              margin: 0.5rem 0;
              font-size: 0.9rem;
              letter-spacing: .1rem;
              font-weight: bold;
            }

            .pricing .card-price {
              font-size: 3rem;
              margin: 0;
            }

            .pricing .card-price .period {
              font-size: 0.8rem;
            }

            .pricing ul li {
              margin-bottom: 1rem;
            }

            .pricing .text-muted {
              opacity: 0.7;
            }

            .pricing .btn {
              font-size: 80%;
              border-radius: 5rem;
              letter-spacing: .1rem;
              font-weight: bold;
              padding: 1rem;
              opacity: 0.7;
              transition: all 0.2s;
            }

            /* Hover Effects on Card */

            @media (min-width: 992px) {
              .pricing .card:hover {
                margin-top: -.25rem;
                margin-bottom: .25rem;
                box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
              }
              .pricing .card:hover .btn {
                opacity: 1;
              }
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
                        <a href="{{ route('login') }}">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Firmesa
                </div>
           
            <header class="jumbotron my-4">
                  <p class="lead">Firmesa (Firmware easy) é uma ferramenta que facilita a criação de kits de instalação para redes mesh. Acesse nossa base de dados e busque manuais e firmwares compativeis com seus equipamentos.</p>
                  <a href="{{ route('gerarkit') }}" class="btn btn-primary btn-lg">Gerar Kit!</a>
                               
            </header>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @if ($firmwares->count() == 0 )

                <div class="alert alert-warning">
                  Por enquanto ainda não temos firmwares cadastrados. 
                </div>
                @else
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                   
                    @foreach($equipments as $equip)
                    <a href="{{ route('equipamentos.show',$equip->id)}}" >
                        <div class="item">
                            <div class="pad15">
                                <p class="lead">{{$equip->manufacture}}</p>
                                <p class="lead">{{$equip->model}}</p>
                                <img class="img-fluid" src="{{asset("{$equip->photo}")}}"/>
                                
                                <!-- <a href="{{ route('equipamentos.edit',$equip->id)}}" class="btn btn-primary">Edit</a> -->
                            </div>
                        </div>
                    </a>
                    @endforeach
                        
                    </div>
                    <button class="btn btn-primary leftLst"><</button>
                    <button class="btn btn-primary rightLst">></button>
                </div>
                @endif
            </div>
        </div>
        
<section class="pricing py-5">
  <div class="container">
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Sysadmins</h5>
            <!-- <h6 class="card-price text-center">$0<span class="period">/month</span></h6> -->
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Redes Mesh</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Redes Comunitárias</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Compartilhe suas experiencias</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Armazene suas configurações</li>
              <!-- <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li> -->
              <!-- <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li> -->
            </ul>
            <a href="{{ url('/sysadmins') }}" class="btn btn-block btn-primary text-uppercase">Ver todos</a>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Equipamentos</h5>
            <!-- <h6 class="card-price text-center">$9<span class="period">/month</span></h6> -->
            <hr>
            <ul class="fa-ul">
              <!-- <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li> -->
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Antenas</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Roteadores</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Diversos Modelos</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Várias marcas</li>
              <!-- <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li> -->
              <!-- <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li> -->
              <!-- <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li> -->
            </ul>
            <a href="{{ url('/equipamentos') }}" class="btn btn-block btn-primary text-uppercase">Ver todos</a>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Firmwares</h5>
            <!-- <h6 class="card-price text-center">$49<span class="period">/month</span></h6> -->
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Libremesh</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>LoRa</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Manuais</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Pacotes personalizados</li>
            <!--   <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li> -->
            </ul>
            <a href="{{ url('/firmwares') }}" class="btn btn-block btn-primary text-uppercase">Ver todos</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <footer class="container">
      <p class="float-right"><a href="#">De volta ao top</a></p>
      <p>© 2019-2020 Firmesa, Inc. · <a href="#">Privacidade</a> · <a href="#">Termos</a></p>
  
    </footer>
    


        <script type="text/javascript" src="{{ URL::asset('js/caroussel.js') }}"></script>
    </div>
    </body>

</html>
