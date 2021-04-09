<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">
    body{width: 100%;}
  	table.informacoes{border:1px solid black; padding: 10px; margin-bottom: 50px; margin-top: 10px;}
  	div#conteudo{ margin-top: 50px;background: purple;position: relative; top:100px;}
  </style>
</head>
<body>
  <img src="{{$fmz_logo}}">
  <hr>

  <h1>Manual Instalação LibreMesh</h1>
  <h3 style="margin-bottom: 50px;">Instruçoes para o Equipamemnto {{$model}}</h3>

  <div style="float: right;">
    <img class="img-fluid" src="{{$photo}}" style="width: 150px; height:150px;">
  </div>
  
  <div style="width:250px;background:;padding: 10px; float: left;">
    <table class="informacoes" style="right: 100px;">
    <tbody>
      <tr>
        <td>Fabricante:</td>
        <td>{{$manufacture}} </td>
      </tr>
      <tr>
        <td>Modelo:</td>
        <td> {{$model}}</td>
      </tr>
      <tr>
        <td>Wan:</td>
        <td> {{$wan}}</td>
      </tr>
      <tr>
        <td>Memória:</td>
        <td> {{$memory}}</td>
      </tr>
      <tr>
        <td>Potência: </td>
        <td> {{$potency}}</td>
      </tr> 
      <tr>
        <td>Antenas: </td>
        <td> {{$antenna}}</td>
      </tr> 
      <tr>
        <td>Alcance: </td>
        <td> {{$range}}</td>
      </tr> 
      <tr>
        <td>Banda: </td>
        <td> {{$band}}</td>
      </tr> 
      <tr>
        <td>Versão: </td>
        <td> {{$version}}</td>
      </tr> 
    </tbody>
    </table>
  </div>
  <div style="width: 450px; background:;margin-left: 50px">
      <!-- <table class="informacoes" style="right: 0px;">
        <tbody>
          <tr>
            <td>Fabricante:</td>
            <td>{{$manufacture}} </td>
          </tr>
          <tr>
            <td>Modelo:</td>
            <td> {{$model}}</td>
          </tr>
          <tr>
            <td>Wan:</td>
            <td> {{$wan}}</td>
          </tr>
          <tr>
            <td>Memória:</td>
            <td> {{$memory}}</td>
          </tr>
          <tr>
            <td>Potência: </td>
            <td> {{$potency}}</td>
          </tr> 
          <tr>
            <td>Antenas: </td>
            <td> {{$antenna}}</td>
          </tr> 
          <tr>
            <td>Alcance: </td>
            <td> {{$range}}</td>
          </tr> 
          <tr>
            <td>Banda: </td>
            <td> {{$band}}</td>
          </tr> 
          <tr>
            <td>Versão: </td>
            <td> {{$version}}</td>
          </tr> 
        </tbody>
      </table> -->

      <p>Fabricante:{{$manufacture}}<br/>
        Modelo: {{$model}}<br/>        
        Wan:{{$wan}}<br/>
        Memória: {{$memory}}<br/>
        Potência: {{$potency}}<br/>
        Antenas: {{$antenna}}<br/>
        Alcance: {{$range}}<br/>
      </p>
  </div>
 

  <div id="conteudo">
    <h3>Instruções</h3>
    <div style="text-align:justify; text-indent: 50px;"> 
      {{$description}}
    </div>
  </div>
</body>
</html>