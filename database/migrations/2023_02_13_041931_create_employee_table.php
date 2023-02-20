<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_title')->unsigned();
            $table->integer('id_dept')->unsigned();
            $table->integer('nip');
            $table->integer('join_date');
            $table->text('address');
            $table->integer('no_ktp');
            $table->integer('birth_date');
            $table->integer('mobile_phone');
            $table->text('photo');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_title')->references('id')->on('title')->onDelete('cascade');
            $table->foreign('id_dept')->references('id')->on('departement')->onDelete('cascade');
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
        Schema::dropIfExists('employee');
    }
}
