@extends('layouts.app')

@section('content')
<div class="container">
  
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h3>Cadastrar Equipamento</h3>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      <br />
    @endif
      <form method="post" action="{{url('equipamentos/cadastrar')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-row style-firm">
            <div class="col-7">
              <label for="manufacture">Fabricante:</label>
              <input type="text" class="form-control" name="manufacture"/>
            </div>
            <div class="col">
              <label for="model">Modelo:</label>
              <input type="text" class="form-control" name="model"/>
            </div>
          </div>
          
          <div class="form-row style-firm">
            <div class="col-3">
              <label for="potency">Potência:</label>
              <input type="text" class="form-control" name="potency"/>
            </div>
            <div class="col">    
                <label for="antenna">Antena:</label>
                <input type="text" class="form-control" name="antenna"/>
            </div>
            <div class="col">    
                <label for="range">Alcance:</label>
                <input type="text" class="form-control" name="range"/>
            </div>
          </div>

          <div class="form-row style-firm">
            <div class="col">    
              <label for="band">Bandas:</label>
              <input type="text" class="form-control" name="band"/>
            </div>
            <div class="col">    
                <label for="wan">Porta WAN:</label>
                <input type="text" class="form-control" name="wan"/>
            </div>
            <div class="col">    
                <label for="memory">Memória:</label>
                <input type="text" class="form-control" name="memory"/>
            </div>  
          </div>
          <div class="form-group style-firm">
              <label for="description">Descrição:</label>
              <textarea class="form-control" name="description"></textarea>
          </div>
          <div class="form-group style-firm">
            <label for="photo">Foto do Equipamento</label>
            <input type="file" name="photo"><br/>
          </div>
          <button type="submit" class="btn btn-success">Cadastrar</button>
      </form>
  </div>
</div>
</div>
@endsection
</div>