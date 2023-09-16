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
        if(Schema::hasTable('gazette_list')) return;
        Schema::create('gazette_list', function (Blueprint $table) {
            $table->id();
            $table->string('unit_id')->nullable();
            $table->string('grower_id')->nullable();
            $table->string('psl_no')->nullable();
            $table->string('purjee_id')->nullable();
            $table->string('day')->nullable();
            $table->string('generate_date')->nullable();
            $table->string('current_loan')->nullable();
            $table->string('remain_cart')->nullable();
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
        Schema::dropIfExists('gazette_lists');
    }
};
