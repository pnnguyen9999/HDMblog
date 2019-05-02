<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AcceptedConfession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('accepted_confession', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('confession_id')->unsigned();
          $table->foreign('confession_id')->references('id')->on('confession');
          $table->integer('accept_by')->unsigned();
          $table->foreign('accept_by')->references('id')->on('users');
          $table->integer('order');
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
        Schema::dropIfExists('accepted_confession');
    }
}
