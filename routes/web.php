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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', array('as' => 'index', 'uses' => 'IndexController@index'));

Route::get('/chamados',array('as' => 'chamados.index', 'uses' => 'ChamadosController@index'));
Route::post('/chamados/save', array('before' => 'csrf', 'as' => 'chamados.save',  'uses' => 'ChamadosController@save'));
