@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
  
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <!-- <h1 class="display-3">Firmware</h1> -->
    <img class="img-fluid" >
    <div class="container">
    <div class="row info" style="text-align:center;">
       <!--  <div class="col-xs-12 alert alert-info">
            The skills meter from <a class="alert-link" href="http://bootsnipp.com/snippets/featured/progress-bar-meter">here</a> is used in this design. 
            Feel free to remove this div from the design.
        </div> -->
    </div>
@if($usuario)
<div class="resume">
    <header class="page-header">
    <!-- 
    <h3></h3>
    <small></small> -->
  </header>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading resume-heading">
        <div class="row">
          <!-- <div class="col-lg-12"> -->
            <div class="col-xs-8 col-sm-8">
              <ul class="list-group">
                <li class="list-group-item">{{ $usuario->name }} </li>
                <li class="list-group-item">{{ $usuario->email }} </li>
              </ul>
            </div>
            <div class="col-xs-4 col-sm-4">
              <figure>
                <!-- <img class="img-circle img-responsive img-thumbnail" alt="" src=""> -->
              </figure>
            </div>
         <!--  </div> -->
        </div>
      </div>
      <div class="bs-callout bs-callout-danger" style="margin-top: 50px;">
        <!-- <h4>Descrição</h4> -->
      </div>
      <div class="bs-callout bs-callout-danger">
       <!--  <h4>Research Interests</h4>
        <p>
          Software Engineering, Machine Learning, Image Processing,
          Computer Vision, Artificial Neural Networks, Data Science,
          Evolutionary Algorithms.
        </p> -->
         <div class="card-header" style="margin-top:50px;">Firmwares</div>

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
                                <td>
                                  <a href="{{ route('firmwares.show',$firm->id)}}" >
                                    {{$firm->name}}
                                  </a>
                                </td>
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
      </div>
  </div>

  </div>
</div>
    
</div>
@endif
</div>	
  
</div>
<!-- </div> -->
@endsection
</div>