@extends('layouts.app')

@section('content')
<div class="container">
  

<div class="row">
<div class="col-sm-12">

  <h1>Equipamentos <a class="btn icon-btn btn-success" style="float:right;" href="{{ url('equipamentos/cadastrar') }}"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>Adicionar</a></h1>  
    <div class="col-sm-12">
      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div>
      @endif
     </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Modelo</td>
          <td>Fabricante</td>
          <td colspan = 2>Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($equipamentos as $equip)
        <tr>
            <td>
              <a href="{{ route('equipamentos.show',$equip->id)}}" >
                {{$equip->model}}
              </a>
            </td>
            <td>{{$equip->manufacture}}</td>
            <td>
                <a href="{{ route('equipamentos.edit',$equip->id)}}" class="btn-sm btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('equipamentos.destroy', $equip->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn-sm btn-danger" type="submit">x</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
</div>