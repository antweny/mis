<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->id();

            $table->string('name')->index()->unique();

            $table->unsignedBigInteger('item_category_id')->nullable();
            $table->foreign('item_category_id')->references('id')->on('item_categories')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('item_unit_id')->nullable();
            $table->foreign('item_unit_id')->references('id')->on('item_units')->onUpdate('set null')->onDelete('set null');

            $table->unsignedInteger('unit_quantity')->default(1);

            $table->unsignedInteger('order_level')->default(0);

            $table->unsignedInteger('quantity')->default(0);

            $table->mediumText('desc')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }

}
