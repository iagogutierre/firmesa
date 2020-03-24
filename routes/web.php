<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', 'WelcomeController');

Route::resource('firmwares', 'FirmwareController');
Route::prefix('firmware')->group(function(){
	Route::get('listar', 'FirmwareController@listar')->name('firmware.listar.index');
	Route::get('cadastrar', 'FirmwareController@create')->name('firmware.cadastrar.index');
	// Route::get('compilar', 'FirmwareController@compilar')->name('firmware.compilar.index');
});
// Route::get('cadastrar', 'FirmwareController@create')->name('firmwares.cadastrar.index');

Route::resource('redes', 'MeshNetworkController');
Route::prefix('rede')->group(function(){
	Route::get('cadastrar', 'MeshNetworkController@create')->name('mesh.cadastrar.index');
});

Route::resource('kits', 'InstallationKitController');
Route::get('/gerarkit', 'InstallationKitController@create')->name('gerarkit');

Route::prefix('kit')->group(function(){
//	Route::get('criar', 'InstallationKitController@create')->name('installationkit.criar.index');
});

Auth::routes();
Route::get('/buscar',[
	'as'=> 'buscar',
	'uses'=>'BuscarController@buscar'
]);
Route::get('/home', 'HomeController@index')->name('home');
