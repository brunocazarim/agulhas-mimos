<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sale', function (Blueprint $table) {
            $table->integer('id_sale')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->foreign('id_sale')->references('id')->on('sales');
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
        Schema::dropIfExists('product_sale');
    }
}
