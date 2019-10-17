<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group_id');
            $table->string('name');
            $table->text('head_office')->nullable();
            $table->text('factory')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('position')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('fax',20)->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->string('country')->nullable();
            $table->text('top_text')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
