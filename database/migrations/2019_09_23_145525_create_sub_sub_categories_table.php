<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('name');
            $table->timestamps();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_sub_categories');
    }
}
