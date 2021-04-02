<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jogador')->nullable();
            $table->foreign('id_jogador')
                    ->references('id')
                    ->on('jogador');
            $table->string('descricao',200);
            $table->integer('bonus_ataque');
            $table->integer('bonus_defesa');
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
        Schema::dropIfExists('equipamento');
    }
}
