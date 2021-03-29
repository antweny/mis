<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('event_category_id')->nullable();
            $table->foreign('event_category_id')->references('id')->on('event_categories')->onDelete('set null')->onUpdate('cascade');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('desc')->nullable();
            $table->timestamps();
        });

        Schema::create('organisers', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('facilitators', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('individual_id');
            $table->foreign('individual_id')->references('id')->on('individual')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('organisers');
        Schema::dropIfExists('facilitators');
        Schema::dropIfExists('events');
    }
}
