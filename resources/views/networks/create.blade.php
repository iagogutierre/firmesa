@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Cadastrar Rede</h1>
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


      <form method="post" action="{{ route('redes.store') }}">
          @csrf
          <div class="form-group" style="height:100px; overflow-y:scroll;">
              <label for="firmware_id">Firmware:</label>
              @foreach($firmwares as $firm)
              <div >
                  <input type="checkbox" id="{{$firm->id}}" value="{{$firm->id}}" name="firm_model[]">
                  <label for="{{$firm->model}}">{{$firm->manufacture}} {{$firm->model}} {{$firm->version}}</label>
              </div>
              @endforeach
          </div>
          <div class="form-group">
              <label for="bssid">BSSID:</label>
              <input type="text" class="form-control" name="bssid"/>
          </div>

          <div class="form-group">
              <label for="location">Localização:</label>
              <input type="text" class="form-control" name="location"/>
          </div>
          <div class="form-group">
              <label for="users_attended">Usuaários atendidos:</label>
              <input type="text" class="form-control" name="users_attended"/>
          </div>
          <div class="form-group">
              <label for="nodos">Nós:</label>
              <input type="text" class="form-control" name="nodos"/>
          </div>
          <div class="form-group">
              <label for="equipament">Equipamentos:</label>
              <input type="text" class="form-control" name="equipament"/>
          </div>
          <div class="form-group">
              <label for="gateway">Gateway:</label>
              <input type="text" class="form-control" name="gateway"/>
          </div>
          <button type="submit" class="btn btn-primary-outline">Cadastrar</button>
      </form>
  </div>
</div>
</div>
@endsection
</div>
