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

                    Seja Bem vindo, você está em uma sessão!
                </div>
                <div class="card-header">Firmwares </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <td>Modelo</td>
                              <td>Versão</td>
                              <td colspan = 2>Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($firmwares as $firm)
                            <tr>
                                <td>{{$firm->model}}</td>
                                <td>{{$firm->version}}</td>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            
                <div class="card-body">
                <div class="card-header">Redes Mesh</div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <td>Bssid</td>
                              <td>Localização</td>
                              <td colspan = 2>Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($networks as $net)
                            <tr>
                                <td>{{$net->bssid}}</td>
                                <td>{{$net->location}}</td>
                                <td>
                                    <a href="{{ route('redes.edit',$net->id)}}" class="btn-sm btn-primary">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('redes.destroy', $net->id)}}" method="post">
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
</div>
@endsection
