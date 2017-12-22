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
    return view('home');
});

Route::get('/insert', 'AlunosController@formulario');
Route::post('/insert', 'AlunosController@post');
Route::get('/listar', 'AlunosController@listing');
Route::delete('listar/delete/{id}', 'AlunosController@destroy');
Route::get('/insert/edit/{id}' , 'AlunosController@edit');
Route::put('/insert/edit/{id}' , 'AlunosController@edit');
Route::put('/insert/edit/{id}' , 'AlunosController@update');

