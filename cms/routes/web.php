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


Route::get('/', function () {
    return view('plantilla');
});


//Route::view('/','paginas.pagina');
//Route::view('/administradores','paginas.administradores');
//Route::view('/circulares','paginas.circulares');
//Route::view('/dictamenes','paginas.dictamenes');
//Route::view('/organismos','paginas.organismos');
//Route::view('/voces','paginas.voces');

//Route::get('/', 'PaginaController@traerPagina');
//Route::get('/administradores', 'AdministradoresController@traerAdministradores');
//Route::get('/circulares', 'CircularesController@traerCirculares');
//Route::get('/dictamenes', 'DictamenesController@traerDictamenes');
//Route::get('/organismos', 'OrganismosController@traerOrganismos');
//Route::get('/voces', 'VocesController@traerVoces');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//RUTAS QUE INCLUYEN TODOS LOS METODOS HTTP
Route::resource('/', 'PaginaController');
Route::resource('/pagina', 'PaginaController');
Route::resource('administradores', 'AdministradoresController');
Route::resource('circulares', 'CircularesController');
Route::resource('dictamenes', 'DictamenesController');
Route::resource('organismos', 'OrganismosController');
Route::resource('voces', 'VocesController');
