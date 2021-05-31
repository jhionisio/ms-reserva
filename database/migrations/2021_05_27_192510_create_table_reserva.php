<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_reserva', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('Chegada');
            $table->date('Saida');
            $table->string('Hotel-id');
            $table->string('Pessoa-id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_reserva');
    }
}
