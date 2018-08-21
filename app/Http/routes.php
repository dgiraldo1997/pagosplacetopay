<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/','InicioController@index');

Route::group(['prefix' => 'pagos', 'namespace' => 'Pagos'], function() {
    Route::resource('formulario', 'FormularioController');
});

