<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dept_name');
            $table->integer('id_manager')->unsigned();
            $table->foreign('id_manager')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_supervisor')->unsigned();
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
        Schema::dropIfExists('departement');
    }
}
