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
        Schema::create('temp_farmers', function (Blueprint $table) {
            $table->id();
            $table->string('center_name')->nullable();
            $table->string('center_address')->nullable();
            $table->string('unit_number')->nullable();
            $table->string('cic_name')->nullable();
            $table->string('cic_number')->nullable();
            $table->string('cda_name')->nullable();
            $table->string('cda_number')->nullable();
            $table->string('farmer_name')->nullable();
            $table->string('farmer_father_name_bn')->nullable();
            $table->string('farmer_name_bn')->nullable();
            $table->string('farmer_father_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('pb_number')->nullable();
            $table->string('nid')->nullable();
            $table->string('mb_ststus')->nullable();
            $table->string('status')->default(1);
            $table->string('lone_status')->default(1);
            $table->string('remain_loan')->nullable();
            $table->string('investade_loan_amount')->nullable()->default(0);
            $table->string('remain_cart')->nullable();
            $table->string('total_amount_cane')->nullable()->default(0);
            $table->string('total_amount_cane_supplied')->nullable()->default(0);
            $table->string('total_amount_sugar_cane_supplied_mt')->nullable()->default(0);
            $table->string('village')->nullable();
            $table->string('village_bn')->nullable();
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
        Schema::dropIfExists('temp_farmers');
    }
};
