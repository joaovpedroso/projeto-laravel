<?php //Inclusão do Menu ?>
@extends('layouts.app')

@section('content')
    <!-- Pagina -->
    <pagina tamanho="12">
        
        <!-- Mostra Mensagem de Erros -->
        @if($errors->all())
        <div class="alert alert-danger text-center">
            @foreach($errors->all() as $key => $value)
            <li><strong>{{$value}}</strong></li>
            @endforeach
        </div>
        @endif
        
        <!-- Painel -->
        <painel titulo="Lista de Produtos">
            <!-- BREADCRUMB -->
            <caminho v-bind:lista="{{$listaCaminho}}"></caminho>
                       
            <!-- Lista de Registros -->
            <tabela-lista 
                v-bind:titulos="['ID','Nome','Valor']"
                v-bind:itens="{{$listaProdutos}}"
                ordem="asc" ordemcol="1"
                criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="132"
                modal="sim"
                
            ></tabela-lista>
        </painel>
    </pagina>

    <modal nome="adicionar" titulo="Adicionar Produto">
        
        <formulario id="formAdicionar" css="" action="{{route('produtos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{old('nome')}}" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor R$</label>
                <input type="text" class="form-control" id="valor" name="valor" placeholder="R$" value="{{old('valor')}}" required>
            </div>

        </formulario>
            
            <span slot="botoes">
                <button form="formAdicionar" class="btn btn-primary">Adicionar</button>
            </span>

    </modal>
    
    <modal nome="editar" titulo="Editar Produto">
        <formulario id="formEditar" css="" action="#" method="put" enctype="" token="1010">
            
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" v-model="$store.state.item.titulo" value="{{old('nome')}}" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor R$</label>
                <input type="text" class="form-control" id="valor" name="valor" v-model="$store.state.item.valor" placeholder="R$" value="{{old('valor')}}" required>
            </div>
            
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-primary">Salvar</button>
        </span>
    </modal>
    
    <modal nome="detalhe" titulo="Detalhe do Produto">

        <p>Produto: @{{$store.state.item.titulo}}</p>
        <p>Valor: R$ @{{$store.state.item.valor}} </p>

    </modal>
    
@endsection