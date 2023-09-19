<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoEventoClasificacionTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_evento_clasificacion', function (Blueprint $table) {
            $table->id('idTipo_evento_clasificacion');
            $table->string('siglas', 45);
            $table->string('descripcion', 45);
            // Puedes agregar más columnas si es necesario

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_evento_clasificacion');
    }
}
