<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('moeda_de_origem', 3);
            $table->string('moeda_de_destino', 3);
            $table->unsignedDecimal('valor_para_conversão'); 
            $table->string('forma_de_pagamento');
            $table->unsignedDecimal('valor_da_Moeda_de_destino');
            $table->unsignedDecimal('valor_comprado_em_Moeda_de_destino');
            $table->unsignedDecimal('taxa_de_pagamento');
            $table->unsignedDecimal('taxa_de_conversão');
            $table->unsignedDecimal('valor_descontando_taxas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotacao');
    }
}
