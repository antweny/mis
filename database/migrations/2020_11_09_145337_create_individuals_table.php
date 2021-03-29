<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('sex', ['Male','Female'])->nullable();
            $table->string('age_group')->nullable();
            $table->string('occupation')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')
                ->on('locations')->onDelete('set null')->onUpdate('cascade');
            $table->mediumText('address')->nullable();
            $table->string('mobile');
            $table->string('email')->unique()->nullable();
            $table->unique(['name','mobile']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('individual');
    }
}
