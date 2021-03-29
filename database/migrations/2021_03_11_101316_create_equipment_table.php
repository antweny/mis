<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('restrict');

            $table->string('model');

            $table->unsignedBigInteger('asset_type_id');
            $table->foreign('asset_type_id')->references('id')->on('asset_types')->onUpdate('cascade')->onDelete('restrict');
            $table->mediumText('desc')->nullable();
            $table->unique(['brand_id','model']);

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }


}
