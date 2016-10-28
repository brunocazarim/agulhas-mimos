<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PROUCT_GROUPS', function (Blueprint $table) {
            $table->increments('ID_GROUP');
            $table->string('NAM_GROUP');
            $table->string('DES_GROUP');
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
        Schema::dropIfExists('product_groups');
    }
}
