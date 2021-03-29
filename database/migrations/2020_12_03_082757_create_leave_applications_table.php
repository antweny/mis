<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('leave_type_id');
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('send_to');
            $table->foreign('send_to')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('days');
            $table->enum('status',['Sub','Rev','Acc','Rej'])->default('Sub');
            $table->text('desc')->nullable();
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
        Schema::dropIfExists('leave_applications');
    }
}
