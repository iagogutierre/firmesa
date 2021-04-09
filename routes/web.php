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


// Route::resource('equipamentos', 'EquipmentController');
Route::get('equipamentos', 'EquipmentController@index');
Route::get('equipamentos/cadastrar/', 'EquipmentController@create')->middleware('auth');
Route::post('equipamentos/cadastrar/', 'EquipmentController@store');
Route::get('equipamentos/{id}/editar', 'EquipmentController@edit')->name('equipamentos.edit')->middleware('auth');
Route::get('equipamentos/{id}', 'EquipmentController@show')->name('equipamentos.show');
// Route::match(['put', 'patch'], 'EquipmentController@update')->name('equipamentos.update')->middleware('auth');
Route::patch('equipamentos/editar/{id}', 'EquipmentController@update')->name('equipamentos.update')->middleware('auth');
Route::post('equipamentos/{id}/excluir', 'EquipmentController@delete')->name('equipamentos.destroy')->middleware('auth');
// Route::post('equipamentos','EquipmentController@store');


Route::get('firmwares', 'FirmwareController@index');
Route::get('firmwares/cadastrar/', 'FirmwareController@create')->middleware('auth');
Route::post('firmwares/cadastrar/', 'FirmwareController@store')->name('firmwares.cadastrar');
Route::get('firmwares/{id}', 'FirmwareController@show')->name('firmwares.show');
Route::get('firmwares/{id}/editar', 'FirmwareController@edit')->name('firmwares.edit')->middleware('auth');
Route::post('firmwares/{id}/excluir', 'FirmwareController@delete')->name('firmwares.destroy')->middleware('auth');
Route::get('fmwlist', 'FirmwareController@firmList');
//Route::match(['put', 'patch'], 'FirmwareController@update')->name('firmwares.update')->middleware('auth');
// Route::resource('firmwares', 'FirmwareController');
// Route::prefix('firmware')->group(function(){
// 	Route::get('listar', 'FirmwareController@listar')->name('firmware.listar.index');
// 	Route::get('cadastrar', 'FirmwareController@create')->name('firmware.cadastrar.index')->middleware('auth');
// 	Route::get('{id}/edit', 'FirmwareController@edit')->name('firmware.edit.index')->middleware('auth');
// });


Route::get('/sysadmins', 'PerfilController@index')->name('sysadmins.listar.index');
Route::get('/sysadmins/{id}/editar', 'PerfilController@edit')->name('sysadmins.edit')->middleware('auth');
Route::post('/sysadmins/{id}/excluir', 'PerfilController@delete')->name('sysadmins.destroy')->middleware('auth');
Route::get('/sysadmins/{id}','PerfilController@show')->name('sysadmins.show');


Route::prefix('kit')->group(function(){
	Route::get('criar', 'InstallationKitController@create')->name('installationkit.criar.index');
});

Route::get('/gerarkit', 'InstallationKitController@create')->name('gerarkit');
Route::post('/gerarkit', 'InstallationKitController@store');

Auth::routes();
Route::get('/buscar',[
	'as'=> 'buscar',
	'uses'=>'BuscarController@buscar'
]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/meuperfil', 'PerfilController@index')->name('meuperfil')->middleware('auth');