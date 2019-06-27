<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceDymanicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_dymanics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->double('price');
            $table->integer("roleQtd");
            $table->enum('status', ['ACTIVE','INATIVE','REMOVE','BLOCK']);
            $table->timestamps();
            $table->bigInteger('sub_products_id')->unsigned()->index();
        });
        Schema::table('price_dymanics', function (Blueprint $table) {
            $table->foreign('sub_products_id')->references('id')->on('sub_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_dymanics');
    }
}
