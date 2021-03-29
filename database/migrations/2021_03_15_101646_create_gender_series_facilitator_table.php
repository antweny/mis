<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenderSeriesFacilitatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gender_series_facilitator', function (Blueprint $table) {
            $table->unsignedBigInteger('gender_series_id');
            $table->foreign('gender_series_id')->references('id')->on('gender_series')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('individual_id');
            $table->foreign('individual_id')->references('id')->on('individuals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gender_series_facilitator');
    }
}
