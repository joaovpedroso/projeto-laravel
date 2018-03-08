<?php //Inclusão do Menu ?>
@extends('layouts.app')

@section('content')

    <catalogo tamanho="12">
        <h3>Produtos</h3>
        
        @foreach($listaProdutos as $produtos => $prod)
            <item tamanho="3" titulo="{{$prod['nome']}}" valor="{{$prod['valor']}}" url="{{route('produto',[$prod['id'], str_slug($prod['nome'])] )}}">
                
            </item>

        @endforeach
        
    </catalogo>
        
@endsection('content')