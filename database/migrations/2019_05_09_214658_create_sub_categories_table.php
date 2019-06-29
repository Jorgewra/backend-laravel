<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('picture')->nullable();
            $table->bigInteger('custumers_id')->unsigned()->index();
            $table->string('description');
            $table->enum('status', ['ACTIVE','INATIVE','REMOVE','BLOCK']);
            $table->timestamps();
        });
        Schema::table('sub_categories', function (Blueprint $table) {
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
        Schema::dropIfExists('sub_categories');
    }
}
