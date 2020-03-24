@extends('layouts.app')

@section('content')
<div class="container">
  
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Cadastrar Firmware</h1>
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
      <form method="post" action="{{ route('firmwares.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="manufacture">Fabricante:</label>
              <input type="text" class="form-control" name="manufacture"/>
          </div>
          <div class="form-group">
              <label for="model">Modelo:</label>
              <input type="text" class="form-control" name="model"/>
          </div>
          <div class="form-group">
              <label for="version">Versão:</label>
              <input type="text" class="form-control" name="version"/>
          </div>
          <div class="form-group">
              <label for="potency">Potência:</label>
              <input type="text" class="form-control" name="potency"/>
          </div>
          <div class="form-group">    
              <label for="antenna">Antena:</label>
              <input type="text" class="form-control" name="antenna"/>
          </div>
          <div class="form-group">    
              <label for="range">Alcance:</label>
              <input type="text" class="form-control" name="range"/>
          </div>
          <div class="form-group">    
              <label for="band">Bandas:</label>
              <input type="text" class="form-control" name="band"/>
          </div>
          <div class="form-group">    
              <label for="wan">Porta WAN:</label>
              <input type="text" class="form-control" name="wan"/>
          </div>
          <div class="form-group">    
              <label for="memory">Memória:</label>
              <input type="text" class="form-control" name="memory"/>
          </div>
          <div class="form-group">    
              <label for="ip">IP:</label>
              <input type="text" class="form-control" name="ip"/>
          </div>
          <div class="form-group">    
              <label for="config_interface">Interface de configuração:</label>
              <input type="text" class="form-control" name="config_interface"/>
          </div>
          <input type="file" name="logo"><br/>
          <input type="file" name="firmwarezip"><br/>

          <button type="submit" class="btn btn-primary-outline">Cadastrar</button>
      </form>
  </div>
</div>
</div>
@endsection
</div>