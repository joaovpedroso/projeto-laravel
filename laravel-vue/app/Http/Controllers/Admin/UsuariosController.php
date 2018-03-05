<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\Rule;

class UsuariosController extends Controller
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
            ["titulo"=>"Lista de Usuários","url"=>""]
        ]);
        
        $listaModelo = User::select('id','name','email')->paginate(5);
        
        return view('admin.usuarios.index', compact('listaCaminho', 'listaModelo'));
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
        //Receber os parametros
        $data = $request->all();
        
        //validar os dados informados
        $validacao = \Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        
        if( $validacao->fails() ){
            return redirect()->back()->withErrors($validacao)->withInput();
        }
        
        //Criptografar a senha informada
        $data['password'] = bcrypt($data['password']);
        
        //Salvar os dados definidos no FIllable
        User::create($data);
        
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
        return User::find($id);
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
        
        //Receber os parametros
        $data = $request->all();
        
        if( isset($data['password']) && $data['password'] != "" ){
            
            $validacao = \Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => ['required','string','email','max:255', Rule::unique('users')->ignore($id) ],                
                'password' => 'required|string|min:6',
            ]);
            //Criptografar a senha informada
            $data['password'] = bcrypt($data['password']);
        }else {
            $validacao = \Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => ['required','string','email','max:255', Rule::unique('users')->ignore($id) ]            
            ]);
            unset($data['password']);
        }
        
        if( $validacao->fails() ){
            return redirect()->back()->withErrors($validacao)->withInput();
        }
        
        //Salvar os dados definidos no FIllable
        User::find($id)->update($data);
        //Redirecionar para a pagina que realizou a requisição
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
        User::find($id)->delete();
        //Redirecionar para a pagina que realizou a requisição
        return redirect()->back();
    }
}
