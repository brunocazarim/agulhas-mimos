<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 45)->unique();
            $table->decimal('total_price', 5, 2);
            $table->integer('total_itens');
            $table->dateTime('dt_sales');
            $table->dateTime('dt_shipping')->nullable();
            $table->dateTime('dt_arrival')->nullable();
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales');
    }
}
