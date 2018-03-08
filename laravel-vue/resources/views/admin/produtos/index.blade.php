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
                v-bind:titulos="['ID','Nome','Valor','Cad Por']"
                v-bind:itens="{{json_encode( $listaProdutos )}}"
                ordem="asc" ordemcol="1"
                criar="#criar" detalhe="/admin/produtos/" editar="/admin/produtos/" deletar="/admin/produtos/" token="{{ csrf_token() }}"
                modal="sim"
                
            ></tabela-lista>
            
            <div align="center">
                {{$listaProdutos}}
            </div>
            
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
        <formulario id="formEditar" css="" v-bind:action="'/admin/produtos/'+$store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
            
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" v-model="$store.state.item.nome" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor R$</label>
                <input type="text" class="form-control" id="valor" name="valor" v-model="$store.state.item.valor" placeholder="R$" required>
            </div>
            
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-primary">Salvar</button>
        </span>
    </modal>
    
    <modal nome="detalhe" titulo="Detalhe do Produto">

        <p><b>Produto: </b>@{{$store.state.item.nome}}</p>
        <p><b>Valor: </b>R$ @{{$store.state.item.valor}} </p>

    </modal>
    
@endsection