<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToAssetTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asset_types', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable()->after('name');
            $table->unique(['name','parent_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asset_types', function (Blueprint $table) {
            $table->dropUnique(['name','parent_id']);
            $table->dropColumn('parent_id');
        });
    }
}
