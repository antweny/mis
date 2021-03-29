<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemOutsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('item_outs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('status',['O','C','I','A','R'])->default('O');

            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('SET NULL');

            $table->unsignedInteger('req_quantity')->default(0);
            $table->unsignedInteger('quantity_out')->nullable();
            $table->date('issued_at')->nullable();
            $table->string('desc')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('item_outs');
    }

}
