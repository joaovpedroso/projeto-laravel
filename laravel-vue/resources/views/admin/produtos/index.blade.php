<?php //Inclusão do Menu ?>
@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Produtos">
            <tabela-lista 
                v-bind:titulos="['ID','Nome','Valor']"
                v-bind:itens="[ [1,'Curso Php OO',2.50], [2,'Curso Laravel Vue JS',29.90]]"
                ordem="asc" ordemcol="1"
                criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="132"
                
            ></tabela-lista>
        </painel>
    </pagina>
@endsection