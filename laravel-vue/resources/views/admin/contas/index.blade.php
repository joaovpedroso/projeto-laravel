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
        <painel titulo="Lista de Contas">
            <!-- BREADCRUMB -->
            <caminho v-bind:lista="{{$listaCaminho}}"></caminho>
                       
            <!-- Lista de Registros -->
            <tabela-lista 
                v-bind:titulos="['ID','Titulo','Descrição','Data']"
                v-bind:itens="{{json_encode( $listaModelo )}}"
                ordem="asc" ordemcol="1"
                criar="#criar" detalhe="/admin/usuarios/" editar="/admin/usuarios/" deletar="/admin/usuarios/" token="{{ csrf_token() }}"
                modal="sim"
                
            ></tabela-lista>
            
            <div align="center">
                {{$listaModelo}}
            </div>
            
        </painel>
    </pagina>

    <modal nome="adicionar" titulo="Adicionar Usuário">
        
        <formulario id="formAdicionar" css="" action="{{route('usuarios.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" placeholder="Nome" value="{{old('name')}}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="exemplo@example.com" value="{{old('email')}}" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password" placeholder="Informe a Senha" value="{{old('password')}}">
            </div>

        </formulario>
            
            <span slot="botoes">
                <button form="formAdicionar" class="btn btn-primary">Adicionar</button>
            </span>

    </modal>
    
    <modal nome="editar" titulo="Editar Produto">
        <formulario id="formEditar" css="" v-bind:action="'/admin/usuarios/'+$store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
            
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" v-model="$store.state.item.name" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" v-model="$store.state.item.email" placeholder="exemplo@example.com" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password" placeholder="Informe a Senha">
            </div>
            
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-primary">Salvar</button>
        </span>
    </modal>
    
    <modal nome="detalhe" titulo="Detalhe do Usuário">

        <p><b>Nome: </b>@{{$store.state.item.name}}</p>
        <p><b>E-Mail: </b> @{{$store.state.item.email}} </p>

    </modal>
    
@endsection