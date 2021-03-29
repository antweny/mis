<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualGroupMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_group_member', function (Blueprint $table) {
            $table->unsignedBigInteger('individual_id');
            $table->foreign('individual_id')->references('id')->on('individual')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('individual_group_id');
            $table->foreign('individual_group_id')->references('id')->on('individual_groups')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individual_group_member');
    }
}
