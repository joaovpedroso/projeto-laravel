<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdTableProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            //Adiconar a Coluna  user_id -> numeros inteiros positivos -> valor padrao()
            $table->integer('user_id')->unsigned()->default(1);
            //Definir Foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            //Desfazer Foreign key
            $table->dropForeign(['user_id']);
            
            //Deletar Coluna
            $table->dropColumn('user_id');
            
        });
    }
}
