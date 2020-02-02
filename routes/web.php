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
    return view('welcome');
}); */

Route::group(["prefix" => "pessoas"], function(){
    Route::get('/', function(){
        return redirect('/pessoas/A');
    });
    Route::get("/novo", "PessoaController@novoView");
    Route::get("/store", "PessoaController@store");
    Route::get("/{id}/editar", "PessoaController@editView");
    Route::get("/update", "PessoaController@update");
    Route::get("/{id}/excluir", "PessoaController@excluirView");
    Route::get("/{id}/destroy", "PessoaController@destroy");
    Route::post("/busca", "PessoaController@busca");
    Route::get("/{letras}", "PessoaController@index");
});