<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custumers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',30)->unique();
            $table->string('code_customize')->nullable();
            $table->string('fullname')->nullable();
            $table->string('picture')->nullable();
            $table->string('street')->nullable();
            $table->string('city',100);
            $table->string('district')->nullable();
            $table->string('state',3);
            $table->string('country')->nullable();
            $table->string('reference',150)->nullable();
            $table->string('numberHome',50)->nullable();
            $table->string('zipCode',20)->nullable();
            $table->boolean('isPaymentCad')->nullable();
            $table->string('isPaymentCash')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->double('rating')->nullable();
            $table->double('fee_fast')->nullable();
            $table->double('fee_long')->nullable();
            $table->double('km_fast')->nullable();
            $table->double('km_long')->nullable();
            $table->string('time_open',10)->nullable();
            $table->string('time_close',10)->nullable();
            $table->boolean('isSaturday')->nullable();
            $table->string('phone');
            $table->boolean('isSunday')->nullable();
            $table->string('token')->nullable();
            $table->integer('users_id')->nullable()->unsigned();
            $table->enum('status', ['ACTIVE','INATIVE','REMOVE','BLOCK']);
            $table->index(['state','city']);
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
        Schema::dropIfExists('custumers');
    }
}
