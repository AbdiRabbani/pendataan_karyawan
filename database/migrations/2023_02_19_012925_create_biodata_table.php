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
            $table->integer('id_dept')->unsigned();
            $table->string('nip');
            $table->string('leaveperyear');
            $table->date('join_date');
            $table->string('status');
            $table->text('adress');
            $table->string('no_ktp')->zerofill();
            $table->date('birth_date');
            $table->string('mobile_phone');
            $table->string('photo');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_dept')->references('id')->on('departement')->onDelete('cascade');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('tax_status');
            $table->string('bpjs_ketenagakerjaan_member_no');
            $table->string('bpjs_kesehatan_member_no');
            $table->string('npwp');
            $table->string('health_insurance_number');
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
