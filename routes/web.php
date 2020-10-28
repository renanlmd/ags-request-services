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

Route::get('/', 'SolicitacaoServicosController@formFuncionario')->name('form-servico');
Route::post('/', 'SolicitacaoServicosController@viewPDF')->name('view_pdf');
Route::get('/teste', 'SolicitacaoServicosController@teste')->name('teste');
Route::get('/solicitacao', 'SolicitacaoServicosController@generatePDF')->name('generate_pdf');