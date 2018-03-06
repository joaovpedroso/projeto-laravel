<template>
    <div v-bind:class="defineTamanho">
        <div class="thumbnail text-center">
            <slot name="imagem"></slot>
            <div class="caption">
                <p>{{titulo}}</p>
                <p>R$ {{valor}}</p>
                <a v-bind:href="url" class="btn btn-danger">Comprar</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['tamanho','titulo','valor','url'],
        computed: {
            defineTamanho: function(){
                if(this.tamanho >= 12){
                    return "col-md-12"
                }
                if(this.tamanho <= 2){
                    return "col-md-2";
                }
                if( ( this.tamanho %2 ) == 0 ){
                    return "col-md-"+this.tamanho;
                }else {
                    return "col-md-"+( parseInt(this.tamanho) + 1 );
                }
                return "col-md-10";
            }
        }
    }
</script>

