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
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function() {

    Route::get('meu_perfil', 'pub\UserController@index')->name('perfil.publicador');
    Route::get('cadastro_publicador', 'pub\UserController@create')->name('cadastro.publicador');
    Route::post('cadastrar_publicador', 'pub\UserController@store')->name('cadastrar.publicador');
    Route::get('regiao_publicador', 'pub\UserController@selectRegiao')->name('regiao.publicador');
    Route::post('salvar_publicador}', 'pub\UserController@updatePublicador')->name('salvar.publicador');


    Route::get('verificador_e_c', 'pub\VerificadorController@index')->name('verificador');

    Route::get('regiao_list_cidades/{id}', 'pub\UserController@listCidades')->name('regiao.list.cidades');

    Route::get('cadastro_evento', 'event\EventoController@create')->name('cadastro.evento');
    Route::get('listar_eventos', 'event\EventoController@listar')->name('listar.eventos');
    Route::post('cadastrar_evento', 'event\EventoController@cadastrar')->name('cadastrar.evento');
    Route::get('editar_evento/{id}', 'event\EventoController@editar')->name('editar.evento');
    Route::post('salvar_evento/{id}', 'event\EventoController@salvar')->name('salvar.evento');
    Route::get('visualizar_evento/{id}', 'event\EventoController@visualizar')->name('visualizar.evento');
    Route::get('excluir_evento/{id}', 'event\EventoController@excluir')->name('excluir.evento');
});
Route::get('user/{id}', function ($id) {
    return 'User ' . $id;
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
