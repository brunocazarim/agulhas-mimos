<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PRODUCTS', function (Blueprint $table) {
            $table->increments('ID_PRODUCT');
            $table->foreign(ID_GROUP)->references('ID_GROUP')->on('PRODUCT_GROUPS');
            $table->string('COD_PRODUCT', 20)->unique();
            $table->string('NAM_PRODUCT');
            $table->longtext('DETAILS_PRODUCT');
            $table->boolean('IS_ACTIVE');
            $table->dateTime('DT_LAST_MODIFICATION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('PRODUCTS');
    }
}
