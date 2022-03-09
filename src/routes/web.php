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

Route::get('/funcionarios', 'FuncionariosController@index')->name("lista_funcionario");
Route::get('/funcionarios/criar', 'FuncionariosController@create')->name("form_criar_funcionario");
Route::post('/funcionarios/criar', 'FuncionariosController@store');
Route::delete('/funcionarios/{id}', 'FuncionariosController@destroy');
Route::post('/funcionarios/{id}/editaNome', 'FuncionariosController@editaNome');
Route::get('/funcionario/{funcionarioId}/movimentacao', 'MovimentacaoController@index');
Route::get('/movimentacao/{funcionarioId}/criar', 'MovimentacaoController@criarMovimentacao')->name("criar_movimentacao");
Route::get('/movimentacao/criar', 'MovimentacaoController@create')->name("form_criar_movimentacao");
Route::post('/movimentacao/criar', 'MovimentacaoController@store');

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');
Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');
Route::get('/sair', 'RegistroController@logout');


Route::any("/funcionario/search",'FuncionariosController@search')->name('funcionario.search');







Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')->name('form_criar_serie');

Route::post('/series/criar', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');


