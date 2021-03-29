<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('mobile');
            $table->mediumText('address')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('group')->nullable();
            $table->unique(['name','mobile']);
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
        Schema::dropIfExists('payees');
    }
}
