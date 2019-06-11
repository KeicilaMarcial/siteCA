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

Route::get('/index','IndexController@index')->name('index');

Auth::routes();
//Todas as rotas que precisam de autentificação devem ser colocadas dentro nessa rota.
Route::group(['middleware' => ['auth']], function () {
	Route::get('/dashBoard', 'DashBoardController@dashBoard')->name('dashBoard');
	Route::post('/store', 'TextosController@store')->name('store');
	Route::get('/update/{id}', 'TextosController@update')->name('update');
	Route::get('/textos', 'TextosController@index')->name('textos');


});