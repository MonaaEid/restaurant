<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            // foreign keys
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('dish_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->foreign('user_id')->references('id')->on('users');
           
            $table->integer('total_price'); //calculated
            
            // date
            $table->date('date');

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
        Schema::dropIfExists('clients_orders');
    }
}
