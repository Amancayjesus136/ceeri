<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexoTable extends Migration
{
    public function up()
    {
        Schema::create('anexo', function (Blueprint $table) {
            $table->id('idAnexo');
            $table->unsignedBigInteger('idAnexo_tipo');
            $table->string('descripcion');
            $table->string('documento_adjunto');
            $table->string('documento_link');
            $table->unsignedInteger('publico');
            
            // Definir relaciones con otras tablas si es necesario
            // $table->foreign('idAnexo_tipo')->references('id')->on('anexo_tipos');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anexo');
    }
}
