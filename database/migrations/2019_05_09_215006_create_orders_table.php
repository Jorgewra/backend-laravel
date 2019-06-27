<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone')->nullable();
            $table->double('total')->nullable();
            $table->double('discount')->nullable();
            $table->string('nameCliente')->nullable();
            $table->enum('paymentType', ['MONEY','CARD','CRYPTO']);
            $table->enum('typeShop', ['DELIVERY','IN_STORE']);
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('reference')->nullable();
            $table->string('complement')->nullable();
            $table->string('numberHome')->nullable();
            $table->string('zipCode')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->enum('status', ['OPEN','IN_PROGRESS','IN_ROUTER','CANCEL','CLOSE','SUSPENSE']);
            $table->bigInteger('clients_id')->unsigned()->index();
            $table->bigInteger('custumers_id')->unsigned()->index();
            $table->bigInteger('coupons_id')->nullable()->unsigned();
            $table->timestamps();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('clients_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('custumers_id')->references('id')->on('custumers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
