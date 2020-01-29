<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTimeTz('reservation_date');
            //foreign keys
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            $table->unsignedBigInteger('table_id');
            $table->foreign('table_id')->references('id')->on('tables');

            $table->unsignedBigInteger('reservation_id');
            $table->foreign('reservation_id')->references('id')->on('reservations');
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
        Schema::dropIfExists('clients_reservations');
    }
}
