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

<div class="resume">
    <header class="page-header">
    
    <h1 class="page-title">{{ $firm->name }} {{ $firm->version}}
      <a class="btn icon-btn btn-success" style="float:right;" href="{{ url('equipamentos/cadastrar') }}"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>Baixar</a>
    </h1>
    <small> <i class="fa fa-clock-o"></i> Ultima atualização: <time>Segunda-feira, 02 Fevereiro, 2020</time></small>
  </header>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading resume-heading" style="margin-bottom: 50px;">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-xs-12 col-sm-4">
             
             
            </div>

            <div class="col-xs-12 col-sm-8">
              <ul class="list-group">
                <li class="list-group-item">Nome: {{ $firm->name }}</li>
                <li class="list-group-item">Versao: {{ $firm->version}}</li>
                <li class="list-group-item">IP: {{ $firm->ip }}</li>
                <li class="list-group-item">Interface: {{ $firm->config_interface }}</li>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="bs-callout bs-callout-danger">
        <h4>Descrição</h4>
        <p>
          {{$firm->description}}
        </p>
       </div>
      <!-- <div class="bs-callout bs-callout-danger">
        <h4>Research Interests</h4>
        <p>
          Software Engineering, Machine Learning, Image Processing,
          Computer Vision, Artificial Neural Networks, Data Science,
          Evolutionary Algorithms.
        </p>
      </div>
 -->
      <!-- <div class="bs-callout bs-callout-danger">
        <h4>Prior Experiences</h4>
        <ul class="list-group">
          <a class="list-group-item inactive-link" href="#">
            <h4 class="list-group-item-heading">
              Software Engineer at Twitter
            </h4>
            <p class="list-group-item-text">
              Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu, 
         te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
            </p>
          </a>
          <a class="list-group-item inactive-link" href="#">
            <h4 class="list-group-item-heading">Software Engineer at LinkedIn</h4>
            <p class="list-group-item-text">
              Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
              Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
              nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                </p><ul>
                  <li>
                 Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
              Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
              nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                  </li>
                  <li>
                 Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
              Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
              nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                  </li>
                </ul>
            <p></p>
          </a>
        </ul>
      </div> -->
  <!--     <div class="bs-callout bs-callout-danger">
        <h4>Key Expertise</h4>
        <ul class="list-group">
          <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc </li>
          <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
          <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
          <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
          <li class="list-group-item">Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
          <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>



        </ul>
      </div> -->
    <!--   <div class="bs-callout bs-callout-danger">
        <h4>Language and Platform Skills</h4>
        <ul class="list-group">
          <a class="list-group-item inactive-link" href="#">
            

            <div class="progress">
              <div data-placement="top" style="width: 80%;" 
              aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-success">
                <span class="sr-only">80%</span>
                <span class="progress-type">Java/ JavaEE/ Spring Framework </span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                <span class="sr-only">70%</span>
                <span class="progress-type">PHP/ Lamp Stack</span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                <span class="sr-only">70%</span>
                <span class="progress-type">JavaScript/ NodeJS/ MEAN stack </span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 65%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-warning">
                <span class="sr-only">65%</span>
                <span class="progress-type">Python/ Numpy/ Scipy</span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                <span class="sr-only">60%</span>
                <span class="progress-type">C</span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 50%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning">
                <span class="sr-only">50%</span>
                <span class="progress-type">C++</span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                <span class="sr-only">10%</span>
                <span class="progress-type">Go</span>
              </div>
            </div>

            <div class="progress-meter">
              <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I suck</span></div>
              <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I know little</span></div>
              <div style="width: 30%;" class="meter meter-right"><span class="meter-text">I'm a guru</span></div>
              <div style="width: 20%;" class="meter meter-right"><span class="meter-text">I''m good</span></div>
            </div>

          </a>

        </ul>
      </div> -->
     <!--  <div class="bs-callout bs-callout-danger">
        <h4>Education</h4>
        <table class="table table-striped table-responsive ">
          <thead>
            <tr><th>Degree</th>
            <th>Graduation Year</th>
            <th>CGPA</th>
          </tr></thead>
          <tbody>
            <tr>
              <td>Masters in Computer Science and Engineering</td>
              <td>2014</td>
              <td> 3.50 </td>
            </tr>
            <tr>
              <td>BSc. in Computer Science and Engineering</td>
              <td>2011</td>
              <td> 3.25 </td>
            </tr>
          </tbody>
        </table>
      </div> -->
    </div>

  </div>
</div>
    
</div>

</div>	
  
</div>
<!-- </div> -->
@endsection
</div>