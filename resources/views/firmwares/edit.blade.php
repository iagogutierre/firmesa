@extends('layouts.app') 
@section('content')
<div class="container">
        
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Atualizar Firmware</h1>

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
            <form method="post"  enctype="multipart/form-data" action="{{ route('firmwares.update', $firm->id) }}" >
                @method('PATCH') 
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="name" value={{ $firm->name }} />
                </div>
                <div class="form-group">
                    <label for="version">Versão:</label>
                    <input type="text" class="form-control" name="version" value={{ $firm->version }} />
                </div>
                <div class="form-group">
                    <label for="model">Modelo:</label>
                    <input type="text" class="form-control" name="model" value={{ $firm->model }} />
                </div>
                <div class="form-group">
                    <label for="architeture">Arquitetura:</label>
                    <input type="text" class="form-control" name="architeture" value={{ $firm->architeture }} />
                </div>
                <div class="form-group">
                    <label for="manufacture">Fabricante:</label>
                    <input type="text" class="form-control" name="manufacture" value={{ $firm->manufacture}} />
                </div>
                <div class="form-group">
                    <label for="logo">Logo:</label>
                     <input type="file" name="logo">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    @endsection
</div>