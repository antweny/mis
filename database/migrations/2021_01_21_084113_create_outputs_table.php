<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->mediumText('desc');
            $table->integer('year');
            $table->unsignedBigInteger('outcome_id');
            $table->foreign('outcome_id')->references('id')->on('outcomes')->onUpdate('cascade')->onDelete('restrict');
            $table->unique(['name','year']);
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
        Schema::dropIfExists('outputs');
    }
}
