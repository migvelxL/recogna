<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaquinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinas', function (Blueprint $table) {
            $table->increments('id_maqui');
            $table->string('nome');
            $table->string('local');
            $table->boolean('status');
            $table->string('manut');
            $table->string('dominio');
            $table->string('cpu');
            $table->string('gpu');
            $table->string('ram');
            $table->string('storage');
            $table->string('mac_address');
            $table->string('senha');
            $table->string('endereco');
            $table->boolean('restrita');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maquinas');
    }
}
