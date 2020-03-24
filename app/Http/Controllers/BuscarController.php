<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Firmware;

class BuscarController extends Controller
{
    //Controller responsavel pelas buscas
    public function buscar(Request $request){
    	//definir uma mensagem de alerta caso não encontre resultado
    	$erro = ['erro'=>'Nenhum resultado encontrado'];
    	if($request->has('q')){
    		// usar a sintaxe do scout pra fazer as buscas 
    		$firmwares = Firmware::search($request->get('q'))->get();
    		return $firmwares->count() ? $firmwares : $erro;
    	}
    	return $erro;
    }
}