<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChofersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresa')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            $table->string('nombres');
            $table->string('apellidos');
            $table->enum('tipo_documento', ['cedula_identidad', 'pasaporte']);
            $table->string('documento');
            $table->date('fecha_nacimiento');
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('chofer');
    }
}
