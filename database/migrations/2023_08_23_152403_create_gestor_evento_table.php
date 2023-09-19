<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestorEventoTable extends Migration
{
    public function up()
    {
        Schema::create('gestor_evento', function (Blueprint $table) {
            $table->id('idGestor_evento');
            $table->unsignedBigInteger('idUsuario');
            $table->string('idEvento', 45);
            
            // Definir relaciones con otras tablas si es necesario
            // $table->foreign('idUsuario')->references('id')->on('usuarios');
            // $table->foreign('idEvento')->references('id')->on('eventos');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gestor_evento');
    }
}
