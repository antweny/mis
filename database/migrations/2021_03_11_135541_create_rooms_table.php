<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('room_category_id');
            $table->foreign('room_category_id')->references('id')->on('room_categories')->onUpdate('cascade')->onDelete('restrict');

            $table->string('name')->unique()->nullable();

            $table->unsignedInteger('number')->nullable();

            $table->unique(['room_category_id','number']);

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
        Schema::dropIfExists('rooms');
    }
}
