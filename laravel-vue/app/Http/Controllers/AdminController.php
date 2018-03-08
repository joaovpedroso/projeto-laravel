<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\User;
use App\Conta;

class AdminController extends Controller
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
            ["titulo"=>"Admin","url"=>""]
        ]);
         
         $produtosCount = Produto::all()->count();
         $usuariosCount = User::all()->count();
         $contasCount = Conta::all()->count();
         
        return view('admin', compact('listaCaminho', 'produtosCount','usuariosCount','contasCount'));
    }
}
