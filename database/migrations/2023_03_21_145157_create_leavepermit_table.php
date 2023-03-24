<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavepermitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leavepermit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_luser')->unsigned();
            $table->integer('id_manager')->unsigned();
            $table->integer('id_supervisor')->unsigned();
            $table->string('name');
            $table->date('startLeave');
            $table->date('endLeave');
            $table->enum('status',['pending', 'approve', 'rejected']);
            $table->foreign('id_luser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_manager')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_supervisor')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('leavepermit');
    }
}
