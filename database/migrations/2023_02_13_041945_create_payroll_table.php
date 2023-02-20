<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::dropIfExists('payroll');
    }
}
