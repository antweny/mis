<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('equipment_id');
            $table->foreign('equipment_id')->references('id')->on('equipment')->onUpdate('cascade')->onDelete('restrict');

            $table->string('serial_no');

            $table->string('code_number')->unique()->nullable();

            $table->unsignedBigInteger('item_unit_id')->nullable();
            $table->foreign('item_unit_id')->references('id')->on('item_units')->onUpdate('cascade')->onDelete('set null');

            $table->date('date')->nullable();

            $table->mediumText('remarks')->nullable();

            $table->unique(['equipment_id','serial_no']);

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
        Schema::dropIfExists('assets');
    }
}
