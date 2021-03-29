<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->mediumText('desc');
            $table->integer('year');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('outcomes');
    }
}
