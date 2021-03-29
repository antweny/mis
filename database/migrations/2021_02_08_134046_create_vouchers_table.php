<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('payment_id')->unique();
            $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade')->onDelete('restrict');

            $table->mediumText('particulars')->nullable();

            $table->mediumText('desc');

            $table->integer('status')->default(0);

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('restrict');

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
        Schema::dropIfExists('vouchers');
    }
}
