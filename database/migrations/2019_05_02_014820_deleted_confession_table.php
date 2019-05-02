<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeletedConfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleted_confession',function(Blueprint $table){
          $table->increments('id');
          $table->integer('confession_id')->unsigned();
          $table->foreign('confession_id')->references('id')->on('confession');
          $table->integer('delete_by')->unsigned();
          $table->foreign('delete_by')->references('id')->on('users');
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
        Schema::dropIfExists('deleted_confession');
    }
}
