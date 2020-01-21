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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cat');
            $table->foreign('cat')->references('id')->on('categories');
            $table->unsignedBigInteger('sub');
            $table->foreign('sub')->references('id')->on('sub_categories');
            $table->unsignedBigInteger('super');
            $table->foreign('super')->references('id')->on('sub_sub_categories');
            $table->string('name');
            $table->string('hover_name');
            $table->string('slug');
            $table->unsignedBigInteger('brand')->nullable();
            $table->foreign('brand')->references('id')->on('brands');
            $table->string('code');
            $table->text('description');
            $table->unsignedInteger('views')->nullable()->dafault(0);
            $table->unsignedInteger('buy_price')->nullable();
            $table->unsignedInteger('price');
            $table->boolean('new');
            $table->string('embroidery');
            $table->string('video_link');
            $table->float('rating');
            $table->float('rating_default');
            $table->unsignedInteger('discount')->nullable()->default(0);
            $table->dateTime('discount_till')->nullable();
            $table->unsignedInteger('free_shipping')->nullable();
            $table->text('details');
            $table->boolean('active')->nullable()->default(0);
            $table->string('thumb1')->nullable()->default('thumb1.jpg');
            $table->string('thumb2')->nullable()->default('thumb2.jpg');
            $table->timestamps();
            $table->unique(['code', 'slug']);
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
