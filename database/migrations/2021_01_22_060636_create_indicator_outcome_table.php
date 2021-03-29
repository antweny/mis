<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicatorOutcomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicator_outcome', function (Blueprint $table) {
            $table->unsignedBigInteger('outcome_id');
            $table->foreign('outcome_id')->references('id')->on('outcomes')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('indicator_id');
            $table->foreign('indicator_id')->references('id')->on('indicators')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicator_outcome');
    }
}
