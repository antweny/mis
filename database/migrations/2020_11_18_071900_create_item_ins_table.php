<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_ins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
            $table->mediumText('desc');
            $table->unsignedDecimal('unit_rate',13,2);
            $table->unsignedDecimal('amount');
            $table->unsignedInteger('quantity_in');
            $table->date('received_at');
            $table->mediumText('remarks')->nullable();
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
        Schema::dropIfExists('item_ins');
    }
}
