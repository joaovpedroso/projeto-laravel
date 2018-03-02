<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    //Carregar a pagina inicial ao digitar a url de produtos
    public function index(){
        //Selecionar todos os produtos no BD
        $produtos = Produto::getAll();
        //Contar quantos produtos tem com a função Count()
    //    $total = Produto::getAll()->count();
        //Retornar os dados na view
        //return view('NOME_DA_VIEW', compact('Parametros SEPARADOS POR , '));
        return view('lista-produtos', compact('produtos','total'));
    }
    
    //Carregar a view responsavel pelo Formulario de cadastro de produtos
    public function adicionar(){
        return view('adicionar-produtos');
    }
    
}
