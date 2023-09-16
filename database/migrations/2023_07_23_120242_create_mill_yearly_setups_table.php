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
        Schema::create('mill_yearly_setups', function (Blueprint $table) {
            $table->id();
            $table->integer('season_id')->nullable();
            $table->string('install_capacity')->nullable();
            $table->string('cane_crushing')->nullable();
            $table->string('sugar_production')->nullable();
            $table->string('recovery_target')->nullable();
            $table->string('date_of_start_mill')->nullable();
            $table->integer('crop_day')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('mill_yearly_setups');
    }
};
