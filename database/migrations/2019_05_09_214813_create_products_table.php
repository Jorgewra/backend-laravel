<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->string('specification')->nullable();
            $table->string('mark')->nullable();
            $table->string('summary')->nullable();
            $table->enum('status', ['ACTIVE','INATIVE','REMOVE','BLOCK']);
            $table->bigInteger('custumers_id')->unsigned()->index();
            $table->bigInteger('categorys_id')->unsigned()->index();
            $table->bigInteger('sub_categorys_id')->nullable()->unsigned()->index();
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('custumers_id')->references('id')->on('custumers')->onDelete('cascade');
            $table->foreign('categorys_id')->references('id')->on('categorys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
