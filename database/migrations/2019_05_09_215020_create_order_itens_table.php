<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_itens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->integer('quantity');
            $table->double('price');
            $table->bigInteger('orders_id')->unsigned()->index();
            $table->bigInteger('sub_products_id')->unsigned()->index();
            $table->timestamps();
        });
        Schema::table('order_itens', function (Blueprint $table) {
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('order_itens');
    }
}
