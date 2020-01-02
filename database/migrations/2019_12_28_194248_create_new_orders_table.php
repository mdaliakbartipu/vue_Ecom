<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('billing_id');
            $table->bigInteger('shipping_id')->nullable();
            $table->bigInteger('variant_id');
            $table->integer('qty');
            $table->integer('unit_price');
            $table->integer('shipping_cost');
            $table->integer('vat');
            $table->integer('discount');
            $table->integer('status')->comment('0=new,1=recieved,2=delivered,3=canceled,4=returned')->default(0);
            $table->text('note')->nullable();
            $table->string('payment_type');
            $table->boolean('payment_status')->default(false);
            $table->string('trans_id')->nullable();
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
        Schema::dropIfExists('new_orders');
    }
}
