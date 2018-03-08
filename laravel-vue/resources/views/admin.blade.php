<?php //Inclusão do Menu ?>
@extends('layouts.app')

@section('content')
<pagina tamanho="10">
        
            <painel titulo="Navegação">
                <caminho v-bind:lista="{{$listaCaminho}}"></caminho>
                
                <div class="row">
                    
                    <div class="col-md-4">
                        <caixa quantidade="{{$produtosCount}}" titulo="Produtos" url="{{route('produtos.index')}}" cor="orange" icone="ion ion-pie-graph"></caixa>
                    </div>
                    
                    <div class="col-md-4">
                        <caixa quantidade="{{$usuariosCount}}" titulo="Usuarios" url="{{route('usuarios.index')}}" cor="lightblue" icone="ion ion-person-stalker"></caixa>
                    </div>
                    
                    <div class="col-md-4">
                        <caixa quantidade="{{$contasCount}}" titulo="Contas" url="{{route('contas.index')}}" cor="red" icone="fa fa-shopping-cart"></caixa>
                    </div>
                    
                </div>
            </painel>
</pagina>
@endsection
