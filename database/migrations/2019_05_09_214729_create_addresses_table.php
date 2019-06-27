<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('street')->nullable();
            $table->string('city',50)->index();
            $table->string('district',50)->nullable();
            $table->string('state',3)->index();
            $table->string('country',50)->nullable();
            $table->string('reference',150)->nullable();
            $table->string('complement',150)->nullable();
            $table->string('numberHome',30)->nullable();
            $table->string('zipCode',20)->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->enum('status', ['ACTIVE','INATIVE','REMOVE','BLOCK']);
            $table->bigInteger('clients_id')->unsigned()->index();
            $table->timestamps();
        });
        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('clients_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
