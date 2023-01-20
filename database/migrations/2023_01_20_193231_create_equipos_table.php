<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->integer("promedio");
            $table->string("nombre");
            $table->unsignedBigInteger("deporte_id");
            $table->unsignedBigInteger("entrenador_id");
            $table->unsignedBigInteger("users_id");
            $table->timestamps();

            $table->foreign('deporte_id') -> references ('id') -> on('deportes')->onDelete('CASCADE');
            $table->foreign('entrenador_id') -> references ('id') -> on('entrenador')->onDelete('CASCADE');
            $table->foreign('users_id') -> references ('id') -> on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
};
