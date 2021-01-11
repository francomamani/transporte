<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasajerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajero', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('viaje_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('viaje_id')
                ->references('id')
                ->on('viaje')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('carnet');
            $table->string('fecha_nacimiento');
            $table->boolean('menor')->default(false);
            $table->unsignedBigInteger('apoderado_id');
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
        Schema::dropIfExists('pasajero');
    }
}
