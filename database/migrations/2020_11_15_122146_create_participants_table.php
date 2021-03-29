<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');

            $table->date('date');

            $table->unsignedBigInteger('individual_id');
            $table->foreign('individual_id')->references('id')->on('individual')->onDelete('cascade')->onUpdate('cascade');

            $table->enum('level',['L','I'])->default('L');

            $table->unsignedBigInteger('individual_group_id')->nullable();
            $table->foreign('individual_group_id')->references('id')->on('individual_groups')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('participant_role_id')->nullable();
            $table->foreign('participant_role_id')->references('id')->on('participant_roles')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('organization_id')->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null')->onUpdate('cascade');

            $table->unique(['individual_id','event_id','date']);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
