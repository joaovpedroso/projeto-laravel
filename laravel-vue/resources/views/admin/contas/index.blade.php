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
                v-bind:titulos="['ID','Titulo','Descrição','Valor','Data']"
                v-bind:itens="{{json_encode( $listaModelo )}}"
                ordem="asc" ordemcol="1"
                criar="#criar" detalhe="/admin/contas/" editar="/admin/contas/" deletar="/admin/contas/" token="{{ csrf_token() }}"
                modal="sim"
                
            ></tabela-lista>
            
            <div align="center">
                {{$listaModelo}}
            </div>
            
        </painel>
    </pagina>

    <modal nome="adicionar" titulo="Adicionar Conta">
        
        <formulario id="formAdicionar" css="" action="{{route('contas.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" placeholder="Nome da Conta" value="{{old('titulo')}}" required>
            </div>
            
            <div class="form-group">
                <label for="descricao">Descricao</label>
                <textarea class="form-control" name="descricao" placeholder="Descreva Sobre a Conta" required>{{old('descricao')}}</textarea>
            </div>
            
            <div class="form-group">
                <label for="vencimento">Data de Vencimento</label>
                <input type="date" class="form-control" name="vencimento" value="{{old('vencimento')}}" required>
            </div>
            
            <div class="form-group">
                <label for="pagamento">Data de Pagamento</label>
                <input type="date" class="form-control" name="pagamento" value="{{old('pagamento')}}">
            </div>
            
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" name="valor" placeholder="R$ 0,00" value="{{old('valor')}}" required>
            </div>

        </formulario>
            
            <span slot="botoes">
                <button form="formAdicionar" class="btn btn-primary">Adicionar</button>
            </span>

    </modal>
    
    <modal nome="editar" titulo="Editar Conta">
        <formulario id="formEditar" css="" v-bind:action="'/admin/contas/'+$store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
            
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" v-model="$store.state.item.titulo" placeholder="Nome" required>
            </div>
        
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" name="descricao" v-model="$store.state.item.descricao" placeholder="Descreva Sobre a Conta" required></textarea>
            </div>
        
            <div class="form-group">
                <label for="vencimento">Data de Vemcimento</label>
                <input type="date" class="form-control" name="vencimento" v-model="$store.state.item.vencimento" required>
            </div>

            <div class="form-group">
                <label for="pagamento">Data de Pagamento</label>
                <input type="date" class="form-control" name="pagamento" v-model="$store.state.item.pagamento">
            </div>
        
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" name="valor" v-model="$store.state.item.valor" required>
            </div>
            
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-primary">Salvar</button>
        </span>
    </modal>
    
    <modal nome="detalhe" titulo="Detalhe da Conta">

        <p><b>Titulo: </b>@{{$store.state.item.titulo}}</p>
        <p><b>Descrição: </b> @{{$store.state.item.descricao}} </p>
        <p><b>Valor: </b> @{{$store.state.item.valor}} </p>
        <p><b>Vencimento: </b> @{{$store.state.item.vencimento}} </p>
        <p><b>Pagamento: </b> @{{$store.state.item.pagamento}} </p>
        <p><b>Valor: </b> @{{$store.state.item.valor}} </p>

    </modal>
    
@endsection