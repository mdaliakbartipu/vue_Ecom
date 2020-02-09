<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('delivery_time')->nullable();
            $table->longText('shipping_and_return')->nullable();
            $table->longText('special_offer')->nullable();
            $table->longText('size_chart')->nullable();
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
        Schema::dropIfExists('common_infos');
    }
}
