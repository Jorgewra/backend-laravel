<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('picture')->nullable();
            $table->enum('status', ['ACTIVE','INATIVE','REMOVE','BLOCK']);
            $table->bigInteger('custumers_id')->unsigned()->index();
            $table->timestamps();
        });
        Schema::table('banners', function (Blueprint $table) {
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
        Schema::dropIfExists('banners');
    }
}
