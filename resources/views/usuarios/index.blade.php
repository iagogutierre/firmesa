@extends('layouts.app')

@section('content')
<div class="container">
  

<div class="row">
<div class="col-sm-12">

  <h1>Sysadmins <a class="btn icon-btn btn-success" style="float:right;" href="{{ url('firmwares/cadastrar') }}"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>Adicionar</a></h1>  
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
          <td>Nome</td>
          <td>E-mail</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $sys)
        <tr>
            <td><a href="{{ route('sysadmins.show',$sys->id)}}">{{$sys->name}}</td>
            <td>{{$sys->email}}</td>
            <td>
                <a href="{{ route('sysadmins.edit',$sys->id)}}" class="btn-sm btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('sysadmins.destroy', $sys->id)}}" method="post">
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