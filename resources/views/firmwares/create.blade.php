@extends('layouts.app')

@section('content')
<div class="container">
  
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h3>Cadastrar Firmware</h3>
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
      <form method="post" action="{{url('firmwares/cadastrar')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-row style-firm">
            <div class="col-7">
              <label for="name">Nome:</label>
              <input type="text" class="form-control" name="name"/>
            </div>
            
            <div class="col">
                <label for="version">Versão:</label>
                <input type="text" class="form-control" name="version"/>
            </div>

          </div>
           <div class="form-group" style="height:100px; overflow-y:scroll;">
              <label for="equipment_id">Equipamentos:</label>
              @if($equipamentos->count() == 0)
                <div class="alert alert-warning">
                  <strong>Atenção!</strong> Ainda não temos nenhum equipamento cadastrado.
                </div>
              @else
               <!--  @foreach($equipamentos as $equip)
                <div >
                    <input type="checkbox" id="{{$equip->id}}" value="{{$equip->id}}" name="firm_model[]">
                    <label for="{{$equip->model}}">{{$equip->manufacture}} {{$equip->model}} </label>
                </div>
                @endforeach -->
                <select name="equipment_id">
                @foreach($equipamentos as $equip)
                  <option value="{{$equip->id}}"> {{$equip->manufacture}} {{$equip->model}} </option>    
                @endforeach 
                </select>
              @endif
          </div>
          
          <div class="form-group style-firm">
              <label for="ip">IP:</label>
              <input type="text" class="form-control" name="ip"/>

              <label for="config_interface">Interface de configuração:</label>
              <input type="text" class="form-control" name="config_interface"/>
          </div>

          <div class="form-group style-firm">
              <label for="description">Descrição:</label>
              <textarea class="form-control" name="description"></textarea>
          </div>
         
          
          <label for="firmwarezip">Arquivo Zip</label>

          <input type="file" name="firmwarezip"><br/>

          <button type="submit" class="btn btn-success">Cadastrar</button>
      </form>
  </div>
</div>
</div>
@endsection
</div>