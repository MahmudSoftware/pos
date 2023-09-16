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
        Schema::table('purjees', function (Blueprint $table) {
            $table->integer('center_id')->nullable()->after('purjeeno');
            $table->integer('unit_id')->nullable()->after('center_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purjees', function (Blueprint $table) {
            $table->dropColumn('center_id');
            $table->dropColumn('unit_id');
        });
    }
};