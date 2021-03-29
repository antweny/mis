<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenderSeriesParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gender_series_participants', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('gender_series_id');
            $table->foreign('gender_series_id')->references('id')->on('gender_series')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('individual_id');
            $table->foreign('individual_id')->references('id')->on('individuals')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('individual_group_id')->nullable();
            $table->foreign('individual_group_id')->references('id')->on('individual_groups')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('participant_role_id')->nullable();
            $table->foreign('participant_role_id')->references('id')->on('participant_roles')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('organization_id')->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null')->onUpdate('cascade');

            $table->unique(['individual_id','gender_series_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('gender_series_participants');
    }
}
