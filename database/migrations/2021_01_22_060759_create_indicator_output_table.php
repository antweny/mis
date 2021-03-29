<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicatorOutputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicator_output', function (Blueprint $table) {
            $table->unsignedBigInteger('output_id');
            $table->foreign('output_id')->references('id')->on('outputs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('indicator_output');
    }
}
