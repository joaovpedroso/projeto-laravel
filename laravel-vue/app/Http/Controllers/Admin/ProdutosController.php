<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaCaminho = json_encode([
            ["titulo"=>"Home","url"=>route('home')],
            ["titulo"=>"Lista de Produtos","url"=>""]
        ]);
        
        $listaProdutos = json_encode(Produto::select('id','nome','valor')->get());
        
        return view('admin.produtos.index', compact('listaCaminho', 'listaProdutos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //DD -> Var Dump
        //dd($request->all());
        //Receber os parametros
        $data = $request->all();
        
        $validacao = \Validator::make($data, [
            "nome" => "required",
            "valor"=> "required"
        ]);
        
        if( $validacao->fails() ){
            return redirect()->back()->withErrors($validacao)->withInput();
        }
        
        //Salvar os dados definidos no FIllable
        Produto::create($data);
        //Redirecionar para a pagina que realizou a requisição
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
