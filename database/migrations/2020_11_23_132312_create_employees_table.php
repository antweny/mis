<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_no')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile',15)->nullable();

            $table->unsignedBigInteger('job_type_id');
            $table->foreign('job_type_id')->references('id')->on('job_types')->onUpdate('cascade')->onDelete('restrict');

            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('restrict');

            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('SET NULL');

            $table->unsignedBigInteger('designation_id')->nullable();
            $table->foreign('designation_id')->references('id')->on('designations')->onUpdate('cascade')->onDelete('SET NULL');

            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('SET NULL');

            $table->enum('sex', ['Male','Female']);
            $table->string('marital_status')->nullable();
            $table->unsignedInteger('children')->nullable();
            $table->date('dob');

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
        Schema::dropIfExists('employees');
    }
}
