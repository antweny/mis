<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->date('date');

            $table->string('payment_no',10);
            $table->string('payment_format');

            $table->string('payment_type');

            $table->unsignedBigInteger('payee_id');
            $table->foreign('payee_id')->references('id')->on('payees')->onUpdate('cascade')->onDelete('restrict');

            $table->unsignedBigInteger('bank_account_id');
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->onUpdate('cascade')->onDelete('restrict');

            $table->decimal('amount',15,2);

            $table->mediumText('amount_words');

            $table->integer('status')->default(0);

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('restrict');

            $table->unique(['payment_no','payment_format']);

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
        Schema::dropIfExists('payments');
    }
}
