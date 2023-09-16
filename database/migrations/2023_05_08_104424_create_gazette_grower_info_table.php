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
        if(Schema::hasTable('gazette_grower_info')) return;
        Schema::create('gazette_grower_info', function (Blueprint $table) {
            $table->id();
            $table->string('center_name')->nullable();
            $table->string('unit_name')->nullable();
            $table->integer('psl_no')->nullable();
            $table->string('remain_cart')->nullable();
            $table->string('invested_loan')->nullable();
            $table->integer('remain_loan')->nullable();
            $table->integer('cfl_no')->nullable();
            $table->integer('unit_id')->nullable();
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
        Schema::dropIfExists('gazette_grower_infos');
    }
};
