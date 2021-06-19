<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('equipos/search', 'EquipoController@search')->name('equipo.search');
Route::resource('/clientes','ClienteController');

Route::resource('/sedescliente', 'SedeclienteController');
Route::get('sedecliente/{id}', 'SedeclienteController@create')->name('sedecliente.create');
Route::get('sedecliente/sedes/{id}', 'SedeclienteController@sedes')->name('sedecliente.sedes');
Route::post('createcliente', 'ClienteController@store');



Route::get('equipos/instalar/{serial?}','EquipoController@instalarEquipo')->name('equipos.instalar');
Route::get('equipos/instalar/autocompletar', 'EquipoController@autocompletar')->name('equipos.autocompletar');
Route::resource('equipos', 'EquipoController');
Route::post('equipos/actualizar', 'EquipoController@actualizar')->name('equipos.actualizar');
Route::post('equipos/editarEstado', 'EquipoController@editarEstado')->name('equipos.editarEstado');

Route::get('instalarEquipo/indexSedes', 'SedeinstalacionController@listarSedes')->name('instalarEquipo.indexSedes');
Route::get('instalarEquipo/search', 'SedeinstalacionController@search')->name('instalarEquipo.search');
Route::get('instalarEquipo/create/{serial?}','SedeinstalacionController@create')->name('instalarEquipo.create');
Route::resource('/instalarequipo','SedeinstalacionController');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
