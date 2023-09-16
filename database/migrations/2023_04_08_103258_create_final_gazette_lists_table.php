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
        if(Schema::hasTable('final_gazette_lists')) return;
        Schema::create('final_gazette_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id')->nullable();
            $table->integer('grower_id')->nullable();
            $table->string('psl_no')->nullable();
            $table->string('purjee_id')->nullable();
            $table->integer('day')->nullable();
            $table->string('generate_date')->nullable();
            $table->float('current_loan',10,2)->nullable();
            $table->integer('remain_cart')->nullable();
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
        Schema::dropIfExists('final_gazette_lists');
    }
};
