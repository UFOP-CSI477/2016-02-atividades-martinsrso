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



Auth::routes();
Route::get('usuario/login', 'UsuarioController@index');
Route::post('usuario/login', 'Auth\LoginController@loginUsuario');
//
//Route::get('paciente/login', 'PacienteController@index');
//Route::post('paciente/login', 'Auth\LoginController@loginPaciente');
//
//
//Route::group(['middleware' => 'auth:pacientes' , 'prefix' => 'paciente'], function (){
//    Route::get('welcome', function (){return view('welcome');});
//});

//Rotas

Route::get('/', 'EventoController@lista'); //1.1
Route::get('/registro', 'RegistroController@listaTodos'); //1.3 a
Route::get('/atleta', 'UsuarioController@lista');
Route::get('registro/atleta', 'RegistroController@relatorioAtleta');
Route::get('registro/evento', 'RegistroController@relatorioEvento');

Route::group(['middleware' => 'auth:usuarios' , 'prefix' => 'usuario'], function (){
    Route::get('evento', 'EventoController@listaById');
    Route::get('registro/create', 'RegistroController@create');
    Route::post('registro/store', 'RegistroController@store');
});
