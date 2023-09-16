<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gazette_grower_info', function (Blueprint $table) {
            $table->integer('office_id')->nullable()->after('id');
            $table->integer('season_id')->nullable()->after('office_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gazette_grower_info', function (Blueprint $table) {
            $table->dropColumn('office_id')->nullable()->after('id');
            $table->dropColumn('season_id')->nullable()->after('office_id');
        });
    }
};
