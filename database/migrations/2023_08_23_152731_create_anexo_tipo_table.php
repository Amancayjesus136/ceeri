<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexoTipoTable extends Migration
{
    public function up()
    {
        Schema::create('anexo_tipo', function (Blueprint $table) {
            $table->id('idAnexo_tipo');
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anexo_tipo');
    }
}
