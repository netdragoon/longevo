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


Route::get('/chamados',array('as' => 'chamados.index', 'uses' => 'ChamadosController@index'));
Route::post('/chamados/save', array('before' => 'csrf', 'as' => 'chamados.save',  'uses' => 'ChamadosController@save'));
Route::get('/chamados/find', array('as' => 'chamados.find.get',  'uses' => 'ChamadosController@find'));


Route::get('/pictures',array('as' => 'pictures.index', 'uses' => 'PicturesController@index'));
Route::post('/pictures/store', array('before' => 'csrf', 'as' => 'pictures.store',  'uses' => 'PicturesController@store'));
Route::get('/pictures/picture/{id}', array('as' => 'pictures.picture',  'uses' => 'PicturesController@picture'));
