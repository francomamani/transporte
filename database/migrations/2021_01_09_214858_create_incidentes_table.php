<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_incidente_id');
            $table->unsignedBigInteger('pasajero_id');
            $table->foreign('tipo_incidente_id')
                ->references('id')
                ->on('tipo_incidente')
                ->onDelete('cascade');
            $table->foreign('pasajero_id')
                ->references('id')
                ->on('pasajero')
                ->onDelete('cascade');
            $table->dateTime('fecha_hora_incidente');
            $table->text('motivo');
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
        Schema::dropIfExists('incidente');
    }
}
