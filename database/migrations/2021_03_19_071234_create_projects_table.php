<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc');
            $table->unsignedBigInteger('stakeholder_id');
            $table->foreign('stakeholder_id')->references('id')->on('stakeholders')->onDelete('restrict')->onUpdate('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('isActive')->default(true);
            $table->enum('reporting_period',['QRT','BIA','ANN'])->nullable();
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
        Schema::dropIfExists('projects');
    }
}
