<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_title')->unsigned();
            $table->integer('id_dept')->unsigned();
            $table->integer('nip');
            $table->date('join_date');
            $table->text('adress');
            $table->integer('no_ktp');
            $table->date('birth_date');
            $table->Biginteger('mobile_phone');
            $table->string('photo');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_title')->references('id')->on('title')->onDelete('cascade');
            $table->foreign('id_dept')->references('id')->on('departement')->onDelete('cascade');
            $table->string('bank_name');
            $table->string('account_name');
            $table->integer('account_number');
            $table->string('tax_status');
            $table->integer('bpjs_ketenagakerjaan_member_no');
            $table->integer('bpjs_kesehatan_member_no');
            $table->integer('npwp');
            $table->integer('health_insurance_number');
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
        Schema::dropIfExists('biodata');
    }
}
