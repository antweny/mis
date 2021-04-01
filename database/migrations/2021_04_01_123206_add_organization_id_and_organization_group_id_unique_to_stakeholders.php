<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrganizationIdAndOrganizationGroupIdUniqueToStakeholders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stakeholders', function (Blueprint $table) {
            $table->unique(['organization_id','organization_group_id']);
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

        Schema::table('stakeholders', function (Blueprint $table) {
            $table->dropUnique(['organization_id','organization_group_id']);
        });

        Schema::enableForeignKeyConstraints();
    }
}
