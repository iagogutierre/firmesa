@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Seja Bem vindo, {{Auth::user()->name}} você está em uma sessão!
                </div>
                <div class="card-header">Firmwares</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <td>Nome</td>
                              <td>Modelo</td>
                              <td>Versão</td>
                              @can('admin')
                              <td colspan = 2>Ações</td>
                              @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($firmwares as $firm)
                            <tr>
                                <td><a href=''>{{$firm->name}}</a></td>
                                <td>{{$firm->model}}</td>
                                <td>{{$firm->version}}</td>
                                @can('admin')
                                <td>
                                    <a href="{{ route('firmwares.edit',$firm->id)}}" class="btn-sm btn-primary">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('firmwares.destroy', $firm->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn-sm btn-danger" type="submit">X</button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">Equipamentos</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <td>Fabricante</td>
                              <td>Modelo</td>
                              @can('admin')
                              <td colspan = 2>Ações</td>
                              @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equipamentos as $equip)
                            <tr>
                                <td>{{$equip->manufacture}}</td>
                                <td>{{$equip->model}}</td>
                                @can('admin')
                                <td>
                                    <a href="{{ route('equipamentos.edit',$equip->id)}}" class="btn-sm btn-primary">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('firmwares.destroy', $equip->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn-sm btn-danger" type="submit">X</button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @can('admin')   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <td>Nome</td>
                              <td>Email</td>
                              <td colspan = 2>Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usr)
                            <tr>
                                <td><a href="{{ route('sysadmins.show',$usr->id)}}">{{$usr->name}}</a></td>
                                <td>{{$usr->email}}</td>
                                <td>
                                    <a href="{{ route('firmwares.edit',$usr->id)}}" class="btn-sm btn-primary">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('firmwares.destroy', $usr->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn-sm btn-danger" type="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection
