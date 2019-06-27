<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname')->nullable();
            $table->string('phone',15)->unique();
            $table->string('petname')->nullable();
            $table->string('token')->nullable();
            $table->string('picture')->nullable();
            $table->enum('status', ['ACTIVE','INATIVE','REMOVE','BLOCK']);
            $table->index('phone');
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
        Schema::dropIfExists('clients');
    }
}
