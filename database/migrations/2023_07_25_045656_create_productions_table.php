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
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->integer('office_id')->nullable();
            $table->string('production_date')->nullable();
            $table->integer('cane_crushed')->nullable();
            $table->integer('sugar_production')->nullable();
            $table->integer('sugar_recovery')->nullable();
            $table->integer('available_sugar')->nullable();
            $table->integer('molasses')->nullable();
            $table->integer('bagasse')->nullable();
            $table->integer('press_mud')->nullable();
            $table->integer('crush_stoppage')->nullable();
            $table->integer('mill_stoppage')->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('productions');
    }
};
