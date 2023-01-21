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
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->integer("nivel");
            $table->string("nombre");
            $table->unsignedBigInteger("posicions_id");
            $table->unsignedBigInteger("equipo_id");
            $table->timestamps();
            $table->foreign('posicions_id') -> references ('id') -> on('posicions')->onDelete('CASCADE');
            $table->foreign('equipo_id') -> references ('id') -> on('equipos')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
};
