<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');

            $table->date('date');
            $table->time('time_from');
            $table->time('time_to');

            $table->unsignedBigInteger('activity_id')->nullable();
            $table->foreign('activity_id')->references('id')->on('activities')->onUpdate('cascade')->onDelete('set null');

            $table->mediumText('desc');

            $table->mediumText('comments')->nullable();

            $table->string('status')->default('S');

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
        Schema::dropIfExists('timesheets');
    }
}
