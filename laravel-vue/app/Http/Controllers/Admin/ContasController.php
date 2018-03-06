<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Conta;

class ContasController extends Controller
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
            ["titulo"=>"Lista de Contas","url"=>""]
        ]);
        
        $listaModelo = Conta::select('id','titulo','descricao','vencimento','valor')->paginate(5);
        
        return view('admin.contas.index', compact('listaCaminho', 'listaModelo'));
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
        $data = $request->all();
        
        if( isset( $data['pagamento'] ) && $data['pagamento'] != "" ){
           
            $validacao = \Validator::make($data, [
                'titulo' => 'required|string',
                'descricao' => 'required|string',
                'vencimento' => 'required|date',
                'pagamento' => 'required|date',
                'valor' => 'required'
            ]);
            
        } else {
            
            $validacao = \Validator::make($data, [
                'titulo' => 'required|string',
                'descricao' => 'required|string',
                'vencimento' => 'required|date',
                'valor' => 'required'
            ]);
            
        }
        
        //Verificar se teve erro na validação dos campos
        if( $validacao->fails() ){
            //Caso retorne erro direciona para página anterior 
            //-> passando os erros 
            //-> retornando os dados do formulario
            return redirect()->back()->withErrors($validacao)->withInput();
        }
        
        //Salvar os dados na var Fillable
        Conta::create($data);
        
        //Redurecionar a página Anterior
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
        //Retornar dados de um ùnico registro
        return Conta::find($id);
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
        //Receber dados do formulário
        $data = $request->all();
               
        //Realizar a validação dos dados informados
        if( isset( $data['pagamento'] ) && $data['pagamento'] != "" ){
            
            $validacao = \Validator::make($data, [
                'titulo' => 'required|string',
                'descricao' => 'required|string',
                'vencimento' => 'required|date',
                'pagamento' => 'required|date',
                'valor' => 'required'
            ]);
            
        }else {
            $validacao = \Validator::make($data, [
                'titulo' => 'required|string',
                'descricao' => 'required|string',
                'vencimento' => 'required|date',
                'valor' => 'required'
            ]);
        }
        
        //Verifica se retornou algum erro na validação
        if( $validacao->fails() ){
            //Retorna a Pagina Anterior
            //->Passa o erro
            //->Retorna os dados no formulário
            return redirect()->back()->withErrors($validacao)->withInput();
        }
        
        //Retorna o ID da Conta e Salva os dados
        Conta::find($id)->update($data);
        
        //Retorna para página anterior
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Seleciona os dados da conta-> Deleta o registro
        Conta::find($id)->delete();
        
        //Retorna a página Anterior
        return redirect()->back();
    }
}
