@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
        <h3>Atualizar Firmware</h3>            
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
            <form method="post"  enctype="multipart/form-data" action="{{ url('firmwares.update', $firm->id) }}" >
                @method('PATCH') 
                @csrf
                <div class="form-row style-firm">
                    <div class="col-7">
                      <label for="name">Nome:</label>
                      <input type="text" class="form-control" name="name" value="{{$firm->name}}"/>
                    </div>
                    
                    <div class="col">
                        <label for="version">Versão:</label>
                        <input type="text" class="form-control" name="version" value="{{$firm->version}}"/>
                    </div>
                </div>
                <div class="form-group style-firm">    
                    <label for="ip">IP:</label>
                    <input type="text" class="form-control" name="ip" value="{{$firm->ip}}"/>
                  
                    <label for="config_interface">Interface de configuração:</label>
                    <input type="text" class="form-control" name="config_interface" value="{{$firm->config_interface}}"/>
                </div>
                <input type="file" name="firmwarezip"><br/>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    @endsection
</div>