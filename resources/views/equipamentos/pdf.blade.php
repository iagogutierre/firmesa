<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">
  	table#tb_informacoes{border:1px solid black; padding: 10px; margin-bottom: 50px; margin-top: 10px; float: left;}
  	div#conteudo{width: 100%; margin-top: 50px;}
  </style>
</head>
<body>
  <img src="{{$fmz_logo}}">
  <hr>

  <h1>Manual Instalação LibreMesh</h1>
  <h3 style="margin-bottom: 50px;">Instruçoes para o Equipamemnto {{$model}}</h3>

  <img class="img-fluid" src="{{$logo}}" style="width: 100px; height:100px;">

  <table id="tb_informacoes">
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
			<td>Versão: </td>
			<td> {{$version}}</td>
		</tr>	
	</tbody>
</table>
  <div id="conteudo">
  <h3>Instruções</h3>
  <div style="text-align:justify; text-indent: 50px;"> 
  {{$description}}
  </div>
</div>
</body>
</html>