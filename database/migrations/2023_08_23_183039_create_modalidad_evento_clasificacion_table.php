<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalidadEventoClasificacionTable extends Migration
{
    public function up()
    {
        Schema::create('modalidad_evento_clasificacion', function (Blueprint $table) {
            $table->id('idModalidad_evento_clasificacion');
            $table->string('nombre', 45);
            $table->string('descripcion', 45);
            // Puedes agregar más columnas si es necesario

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modalidad_evento_clasificacion');
    }
}
