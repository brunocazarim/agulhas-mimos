<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('measures')->nullable();
            $table->longtext('primary_info')->nullable();
            $table->longtext('secondary_info')->nullable();
            $table->longtext('tertiary_info')->nullable();
            $table->dateTime('dt_last_modification');
            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_specifications');
    }
}
