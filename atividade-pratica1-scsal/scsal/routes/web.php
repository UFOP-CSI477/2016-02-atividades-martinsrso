<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group(['middleware' => 'auth:pacientes', 'prefix' => 'paciente'], function (){
    Route::get('home', ['as' => 'homePaciente', 'uses' => 'PacienteController@home']);
    Route::group(['prefix' => 'exame'], function(){
        Route::get('listar', ['as' => 'listarExamesPaciente', 'uses' => 'ExameController@listar']);
        Route::get('solicitar', ['as' => 'showSolicitarExame', 'uses' => 'ExameController@showSolicitar']);
        Route::post('solicitar', ['as' => 'solicitarExame', 'uses' => 'ExameController@solicitar']);
    });
});

Route::group(['middleware' => 'auth:usuarios', 'prefix' => 'usuario'], function (){
    Route::group(['middleware' => 'can:administrar', 'prefix' => 'administrador'], function (){
        Route::group(['prefix' => 'procedimento'], function(){
            Route::get('listar', ['as' => 'listarProcedimentos', 'uses' => 'ProcedimentoController@listar']);
            Route::get('adicionar', ['as' => 'showAdicionarProcredimento', 'uses' => 'ProcedimentoController@showAdicionar']);
            Route::post('adicionar', ['as' => 'adicionarProcedimento', 'uses' => 'ProcedimentoController@adicionar']);
        });
        Route::get('relatorio/paciente', ['as' => 'relatorioPacientes', 'uses' => 'PacienteController@relatorio']);
        Route::get('relatorio/procedimento', ['as' => 'relatorioProcedimento', 'uses' => 'ProcedimentoController@relatorio']);
    });


    Route::group(['middleware' => 'can:operar', 'prefix' => 'operador'], function(){
        Route::get('procedimento/editar/{exame}', ['as' => 'showEditarProcedimentoOperador', 'uses' => 'ProcedimentoController@showEditarOperador']);
    });

    Route::get('home', ['as' => 'homeUsuario', 'uses' => 'UsuarioController@home']);
    Route::get('listar/exame', ['as' => 'listarExames', 'uses' => 'ExameController@listarTodos']);
    Route::post('editar', ['as' => 'editarProcedimento', 'uses' => 'ProcedimentoController@editar']);
});


Route::get('/', function () {
    return view('inicio');
});

Route::get('geral/procedimentos', ['as' => 'procedimentosAreaGeral', 'uses' => 'ProcedimentoController@listarGeral']);


Route::get('login', ['as' => 'selecaoLogin', 'uses' => 'Auth\LoginController@showSelecaoLogin']);
Route::get('usuario/login', ['as' => 'showLoginUsuario', 'uses' => 'Auth\LoginController@showLoginUsuario']);
Route::post('usuario/login', ['as' => 'loginUsuario', 'uses' => 'Auth\LoginController@loginUsuario']);

Route::group(['prefix' => 'paciente'], function() {
    Route::get('login', ['as' => 'showLoginPaciente', 'uses' => 'Auth\LoginController@showLoginPaciente']);
    Route::post('login', ['as' => 'loginPaciente', 'uses' => 'Auth\LoginController@loginPaciente']);
    Route::get('cadastrar', ['as' => 'showCadastroPaciente', 'uses' => 'PacienteController@showCadastro']);
    Route::post('cadastrar', ['as' => 'cadastroPaciente', 'uses' => 'PacienteController@cadastrar']);
});

Route::get('sair', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
