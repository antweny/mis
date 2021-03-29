<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('individual_id');
            $table->foreign('individual_id')->references('id')->on('individual')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('individual_group_id');
            $table->foreign('individual_group_id')->references('id')->on('individual_groups')->onDelete('cascade')->onUpdate('cascade');

            $table->date('start_date')->nullable();

            $table->date('end_date')->nullable();
            $table->text('desc')->nullable();
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
        Schema::dropIfExists('resource_people');
    }
}
