@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
 <div class="col-sm-8 offset-sm-2">
 <!--    <h1 class="display-3">Gerar kit de intalação</h1> -->

    <div class="jumbotron">
      <div class="col-sm-9 mx-auto">
        <h1>Gerar kit de Instalação</h1>
        <p>
          Olá, você está prestes a criar um kit de instalação para Redes Mesh. Ao completar o processo você recebera um arquivo compactado contendo:</p>
          <ul>
            <li>Firmwares</li>
            <li>Manuais de Instalação</li>
            <li>Guia de configuração da rede</li>
          </ul>
          <p>. Consulte a documentação online.</p>

         <!--  <p>At the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.</p> -->
        <p>
          <a class="btn btn-primary" href="/docs/4.5/components/navbar/" role="button">Como montar uma rede mesh »</a>
        </p>
      </div>
    </div>
  
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="jumbotron">
      <form method="post" action="{{url('gerarkit')}}">
          @csrf
          <div class="form-row" style="height:100px; overflow-y:scroll;display: inherit;">
              <label for="firmware_id">Firmwares:</label>
              @foreach($equips as $equip)
              <div >
                  <input type="checkbox" id="{{$equip->id}}" value="{{$equip->id}}" name="firm_model[]">
                  <label for="{{$equip->model}}">{{$equip->manufacture}} {{$equip->model}} {{$equip->name}} {{$equip->version}}</label>
              </div>
              @endforeach
          </div>
          <div class="form-row style-firm" style="margin-top:50px;">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>

   <!--  <div class="jumbotron">
      <div class="col-sm-8 mx-auto">
        <h1>Navbar examples</h1>
        <p>This example is a quick exercise to illustrate how the navbar and its contents work. Some navbars extend the width of the viewport, others are confined within a <code>.container</code>. For positioning of navbars, checkout the <a href="/docs/4.5/examples/navbar-static/">top</a> and <a href="/docs/4.5/examples/navbar-fixed/">fixed top</a> examples.</p>
        <p>At the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.</p>
        <p>
          <a class="btn btn-primary" href="/docs/4.5/components/navbar/" role="button">View navbar docs »</a>
        </p>
      </div>
    </div> -->
  
          <button type="submit" class="btn btn-success">Baixar</button>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
</div>
