<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_table')->unsigned()->nullable();
            $table->integer('id_dish')->unsigned()->nullable();
//            $table->foreign('id_table')
//                ->references('id')->on('tables')
//                ->onDelete('cascade');
//            $table->foreign('id_dish')
//                ->references('id')->on('dish')
//                ->onDelete('cascade');
            $table->integer('status');
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
        Schema::dropIfExists('orders');
    }
}
