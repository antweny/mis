<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['NS','IP','COM']);
            $table->mediumText('desc');
            $table->decimal('budget',15,2);
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('SET NULL');
            $table->unsignedBigInteger('output_id');
            $table->foreign('output_id')->references('id')->on('outputs')->onUpdate('cascade')->onDelete('restrict');
            $table->date('due_date');
            $table->unique(['name','output_id']);
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
        Schema::dropIfExists('activities');
    }
}
