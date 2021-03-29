<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('acronym')->nullable();
            $table->unsignedBigInteger('organization_category_id')->nullable();
            $table->foreign('organization_category_id')->references('id')->on('organization_categories')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null')->onUpdate('cascade');
            $table->mediumText('address')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->integer('founded')->nullable();
            $table->mediumText('desc')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
