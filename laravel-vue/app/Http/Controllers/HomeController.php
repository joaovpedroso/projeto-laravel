<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\User;
use App\Conta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $listaCaminho = json_encode([
            ["titulo"=>"Home","url"=>""]
        ]);
         
         $produtosCount = Produto::all()->count();
         $usuariosCount = User::all()->count();
         $contasCount = Conta::all()->count();
         
        return view('home', compact('listaCaminho', 'produtosCount','usuariosCount','contasCount'));
    }
}
