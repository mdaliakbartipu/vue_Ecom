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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('cat');
            $table->foreign('cat')->references('id')->on('categories');
            $table->unsignedBigInteger('sub');
            $table->foreign('sub')->references('id')->on('sub_categories');
            $table->unsignedBigInteger('super');
            $table->foreign('super')->references('id')->on('sub_sub_categories');
            $table->string('name');
            $table->string('code');
            $table->text('description');
            $table->string('price');
            $table->string('discount');
            $table->text('details');
            $table->integer('sleeve');
            $table->integer('leglength');
            $table->integer('fit');
            $table->string('thumb1')->nullable()->default('thumb1.jpg');
            $table->string('thumb2')->nullable()->default('thumb1.jpg');
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
        Schema::dropIfExists('products');
    }
}
