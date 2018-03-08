<?php
use App\Produto;
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

Route::get('/', 'IndexController@index')->name('site');

Route::get('/produto', function(){
    return redirect()->route('site');
});
Route::get('/produto/{id}/{titulo?}', function($id){
    if( !$id ){
        return redirect()->route('site');
    }else {
        $produto = Produto::find($id);

        if( $produto ){
            return view('produto', compact('produto'));
        }
        
        return redirect()->route('site');
    }
        
})->name('produto');

Auth::routes();

//Rota para página Inicial após Login
Route::get('/admin', 'AdminController@index')->name('admin');

//DEFINIR UM GRUPO DE ROTAS PROTEGIDO PELO LOGIN NO SISTEMA
Route::middleware('auth')->prefix('admin')->namespace('Admin')->group( function(){
    
    //Rota para os produtoss
    Route::resource('produtos', 'ProdutosController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('contas', 'ContasController');
    
});
