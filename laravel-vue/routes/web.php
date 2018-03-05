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
    return view('welcome');
});

Auth::routes();

//Rota para página Inicial após Login
Route::get('/home', 'HomeController@index')->name('home');

//DEFINIR UM GRUPO DE ROTAS PROTEGIDO PELO LOGIN NO SISTEMA
Route::middleware('auth')->prefix('admin')->namespace('Admin')->group( function(){
    
    //Rota para os produtoss
    Route::resource('produtos', 'ProdutosController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('contas', 'ContasController');
    
});
