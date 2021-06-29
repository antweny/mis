<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActiveAndUniqueKeyToExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->boolean('active')->default(true)->after('desc');
            //$table->unique(['individual_id','organization_id','active']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('experiences', function (Blueprint $table) {
            //$table->dropUnique(['individual_id','organization_id','active']);
            $table->dropColumn('active');
        });

        Schema::enableForeignKeyConstraints();
    }
}
