<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThematicAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thematic_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('desc')->nullable();
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->unique(['name','parent_id']);
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
        Schema::dropIfExists('thematic_areas');
    }
}
