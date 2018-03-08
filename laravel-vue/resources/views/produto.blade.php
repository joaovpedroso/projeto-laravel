<?php //Inclusão do Menu ?>
@extends('layouts.app')

@section('content')

    <catalogo tamanho="12">
        <h3>{{$produto->nome}}</h3>
        <div class="col-md-12" align="center">
            <p><b>Descrição: </b>{{$produto->nome}}</p>
            <p><b>Preço: </b>{{$produto->valor}}</p>
        </div>
        
    </catalogo>
        
@endsection('content')