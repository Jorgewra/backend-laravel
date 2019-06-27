<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('rating');
            $table->string('commet')->nullable();
            $table->bigInteger('clients_id')->unsigned()->index();
            $table->bigInteger('orders_id')->unsigned()->index();
            $table->timestamps();
        });
        Schema::table('evaluations', function (Blueprint $table) {
            $table->foreign('clients_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
