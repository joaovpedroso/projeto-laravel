<?php //Inclusão do Menu ?>
@extends('layouts.app')

@section('content')
<pagina tamanho="11">
            <painel titulo="Navegação">
                <div class="row">
                    
                    <div class="col-md-4">
                        <caixa quantidade="10" titulo="Produtos" url="/produtos" cor="orange" icone="ion ion-pie-graph"></caixa>
                    </div>
                    
                    <div class="col-md-4">
                        <caixa quantidade="19" titulo="Usuarios" url="/usuarios" cor="lightblue" icone="ion ion-person-stalker"></caixa>
                    </div>
                    
                    <div class="col-md-4">
                        <caixa quantidade="50" titulo="Vendas" url="/vendas" cor="red" icone="fa fa-shopping-cart"></caixa>
                    </div>
                    
                </div>
            </painel>
</pagina>
@endsection
