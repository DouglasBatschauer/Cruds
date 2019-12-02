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

Auth::routes();

Route::get('/home', 'ProdutosController@index')->name('home');
Route::get('/', 'ProdutosController@index')->name('home');
Route::get('/cliente', 'ClienteController@index')->name('cliente');
Route::get('/pedido-compras', 'PedidosComprasController@index')->name('pedido-compras');

Route::resource('/produtos', 'ProdutosController');
Route::resource('/cliente', 'ClienteController');
Route::resource('/pedido-compras', 'PedidosComprasController');
Route::get('/pedido-compras/{id}/verCliente', 'PedidosComprasController@verCliente');
Route::get('/pedido-compras/{id}/verProduto', 'PedidosComprasController@verProduto');

