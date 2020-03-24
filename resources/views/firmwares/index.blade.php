@extends('layouts.app')

@section('content')
<div class="container">
  

<div class="row">
<div class="col-sm-12">

  <h1 class="display-3">Firmwares</h1>  
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
          <td>Versão</td>
          <td colspan = 2>Actions</td>
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