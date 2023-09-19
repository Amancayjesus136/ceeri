<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedeEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sede_evento', function (Blueprint $table) {
            $table->id('idSede_evento');
            $table->unsignedBigInteger('idSede');
            $table->unsignedBigInteger('idEvento');
            
            // Definir las relaciones con las otras tablas si es necesario
            // $table->foreign('idSede')->references('id')->on('sedes');
            // $table->foreign('idEvento')->references('id')->on('eventos');
            
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
        Schema::dropIfExists('sede_evento');
    }
}
