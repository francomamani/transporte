<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaje', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tramo_id');
            $table->unsignedBigInteger('chofer_id');
            $table->unsignedBigInteger('vehiculo_id');
            $table->foreign('tramo_id')
                ->references('id')
                ->on('tramo')
                ->onDelete('cascade');
            $table->foreign('chofer_id')
                ->references('id')
                ->on('chofer')
                ->onDelete('cascade');
            $table->foreign('vehiculo_id')
                ->references('id')
                ->on('vehiculo')
                ->onDelete('cascade');
            $table->dateTime('fecha_hora_salida');
            $table->dateTime('fecha_hora_arrivo');
            $table->enum('estado_viaje', ['en_espera', 'en_recorrido', 'arrivado', 'con_incidente']);
            $table->softDeletes();
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
        Schema::dropIfExists('viaje');
    }
}
