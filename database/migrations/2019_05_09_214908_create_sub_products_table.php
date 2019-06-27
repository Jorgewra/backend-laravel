<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',50)->nullable()->index();
            $table->string('picture')->nullable();
            $table->string('description');
            $table->double('price');
            $table->double('discount')->nullable();
            $table->boolean('isOffer')->nullable();
            $table->enum('status', ['ACTIVE','INATIVE','REMOVE','BLOCK']);
            $table->bigInteger('products_id')->unsigned()->index();
            $table->timestamps();
        });
        Schema::table('sub_products', function (Blueprint $table) {
            $table->foreign('products_id')->references('id')->on('custumers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_products');
    }
}
