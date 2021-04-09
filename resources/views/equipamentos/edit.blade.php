@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
        <h3 >Atualizar Equipamento</h3>            
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
            <form method="post"  enctype="multipart/form-data" action="{{ url('equipamentos/editar/'.$equip->id) }}" >
                @method('PATCH') 
                @csrf

                <div class="form-row style-firm">
                    <div class="col-7">
                        <label for="manufacture">Fabricante:</label>
                        <input type="text" class="form-control" name="manufacture" value="{{$equip->manufacture}}"/>
                    </div>
                    <div class="col">
                        <label for="model">Modelo:</label>
                        <input type="text" class="form-control" name="model" value= "{{ $equip->model }}" />
                    </div>
                </div>
                
                <div class="form-row style-firm">
                    <div class="col-3">
                        <label for="potency">Potência:</label>
                        <input type="text" class="form-control" name="potency" value="{{$equip->potency}}"/>
                    </div>
                    <div class="col">
                        <label for="antenna">Antena:</label>
                        <input type="text" class="form-control" name="antenna" value="{{$equip->antenna}}"/>
                    </div>
                    <div class="col">
                        <label for="range">Alcance:</label>
                        <input type="text" class="form-control" name="range" value="{{$equip->range}}"/>
                    </div>
                </div>

                
                <div class="form-row style-firm">    
                    <div class="col">
                        <label for="band">Bandas:</label>
                        <input type="text" class="form-control" name="band" value="{{$equip->band}}"/>
                    </div>
                    <div class="col">
                        <label for="wan">Porta WAN:</label>
                        <input type="text" class="form-control" name="wan" value="{{$equip->wan}}"/>
                    </div>
                    <div class="col">
                        <label for="memory">Memória:</label>
                        <input type="text" class="form-control" name="memory" value="{{$equip->memory}}"/>
                    </div>
                </div>
                <div class="form-group style-firm">
                    <label for="description">Descrição:</label>
                    <textarea class="form-control" name="description">{{$equip->description}}
                    </textarea>
                </div>
                <div class="form-group style-firm">
                    <div class="foto-firmware" style="width:200px; height:200px;">
                        <img class="img-fluid img-thumbnail" src="{{asset("{$equip->photo}")}}">
                    </div>
                </div>
                <div class="form-group style-firm">
                    <input type="file" placeholder= "Foto do equipamento" name="photo"><br/>
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    @endsection
</div>