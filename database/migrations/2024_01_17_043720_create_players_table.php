<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('nome do jogador');
            $table->unsignedTinyInteger('skill_level')->comment('de 1 a 5, sendo 1 o pior e 5 o melhor');
            $table->boolean('is_goalkeeper')->default(false)->comment('considerando que false não é goleiro');
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
};
