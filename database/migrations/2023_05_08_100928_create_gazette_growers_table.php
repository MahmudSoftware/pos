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
        if(Schema::hasTable('gazette_growers')) return;
        Schema::create('gazette_growers', function (Blueprint $table) {
            $table->id('grower_id');
            $table->string('unit_id')->nullable();
            $table->string('psl_no')->nullable();
            $table->integer('farmer_id')->nullable();
            $table->string('grower_name')->nullable();
            $table->string('grower_name_bangla')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_name_bangla')->nullable();
            $table->string('village')->nullable();
            $table->string('village_bangla')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('mobile_status')->nullable();
            $table->string('grower_status')->nullable();
            $table->string('national_id')->nullable();
            $table->bigInteger('loan_status')->nullable();
            $table->float('current_loan',10,2)->nullable();
            $table->string('trolly_size')->nullable();
            $table->integer('production_amount')->nullable();
            $table->float('remain_cart',10,2)->nullable();
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
        Schema::dropIfExists('gazette_growers');
    }
};
