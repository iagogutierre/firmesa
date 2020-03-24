@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->

<div class="row">
 <div class="col-sm-8 offset-sm-2">



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

        <h1 class="page-title">Resumo da Rede {{ $mesh->bssid }} </h1>
        <small> <i class="fa fa-clock-o"></i> Ultima atualização: <time>Sunday, October 05, 2014</time></small>
      </header>
      <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading resume-heading">
            <div class="row">
              <div class="col-lg-12">
                <div class="col-xs-12 col-sm-4">


                </div>

                <div class="col-xs-12 col-sm-8">
                </div>
              </div>
            </div>
          </div>
          <div class="bs-callout bs-callout-danger">
            <h4>Summary</h4>
            <p>
             Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu,
             te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
            </p>
            <p>
                Odio recteque expetenda eum ea, cu atqui maiestatis cum. Te eum nibh laoreet, case nostrud nusquam an vis.
                Clita debitis apeirian et sit, integre iudicabit elaboraret duo ex. Nihil causae adipisci id eos.

            </p>
          </div>
          <div class="bs-callout bs-callout-danger">
            <h4>Research Interests</h4>
            <p>
              Software Engineering, Machine Learning, Image Processing,
              Computer Vision, Artificial Neural Networks, Data Science,
              Evolutionary Algorithms.
            </p>
          </div>


        </div>

      </div>
    </div>

    </div>

    </div>

</div>
<!-- </div> -->
@endsection
</div>
