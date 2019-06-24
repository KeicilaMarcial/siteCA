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

/*Route::get('/', function () {
    return view('index');
});
*/

Route::get('/','IndexController@index')->name('index');
Route::get('/documentosSite','DocumentosSiteController@documentosSite')->name('documentosSite');
//Não encosta no meu codigo
Auth::routes();
//Todas as rotas que precisam de autentificação devem ser colocadas dentro nessa rota.
Route::group(['middleware' => ['auth']], function () {
	Route::get('/dashBoard', 'DashBoardController@dashBoard')->name('dashBoard');
	Route::post('/storeTexto', 'TextosController@store')->name('store');
	Route::get('/updateTexto/{id}', 'TextosController@updateTextos')->name('updateTextos');
	Route::get('/textos', 'TextosController@textos')->name('textos');
	
	Route::get('/projetos', 'ProjetosController@projetos')->name('projetos');
	Route::post('/storeProjeto', 'ProjetosController@store')->name('store');
	Route::get('/projetos', 'ProjetosController@projetos')->name('projetos');
	Route::post('/storeProjeto', 'ProjetosController@store')->name('store');
	Route::get('/updateProjeto/{id}', 'ProjetosController@update')->name('update');
	Route::delete('/destroyProjeto/{id}', 'ProjetosController@destroy')->name('destroy');
	
	Route::get('/eventos', 'EventosController@eventos')->name('eventos');
	Route::post('/storeEvento', 'EventosController@store')->name('store');
    Route::get('/updateEvento/{id}', 'EventosController@update')->name('update');
	Route::delete('/destroyEvento/{id}', 'EventosController@destroy')->name('destroy');
	
	Route::get('/arquivos_1', 'ArquivosController@arquivos')->name('arquivos');
	Route::post('/storeArquivo', 'ArquivosController@store')->name('store');
	Route::get('/updateArquivo/{id}', 'ArquivosController@update')->name('update');
	Route::delete('/destroyArquivo/{id}', 'ArquivosController@destroy')->name('destroy');

	Route::get('/imagens_1', 'ImagensController@imagens')->name('imagens');
	Route::post('/storeImagem', 'ImagensController@store')->name('store');
	Route::get('/updateImagem/{id}', 'ImagensController@update')->name('update');
	Route::delete('/destroyImagem/{id}', 'ImagensController@destroy')->name('destroy');

});