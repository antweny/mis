<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('stakeholder_id');
            $table->foreign('stakeholder_id')->references('id')->on('stakeholders')->onDelete('restrict')->onUpdate('cascade');

            $table->string('number',20);

            $table->date('op')->nullable();

            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('restrict')->onUpdate('cascade');

            $table->decimal('balance',15,2)->nullable();

            $table->boolean('active')->default(1);

            $table->mediumText('desc')->nullable();

            $table->unique(['stakeholder_id','number']);

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
        Schema::dropIfExists('bank_accounts');
    }
}
