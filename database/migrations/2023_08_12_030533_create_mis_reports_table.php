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
        Schema::create('mis_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('purjee_id')->nullable();
            $table->string('total_loan')->nullable();
            $table->string('actual_weight_date')->nullable();
            $table->string('purchase_sheet_no')->nullable();
            $table->string('weight_vauchar')->nullable();
            $table->string('actual_weight')->nullable();
            $table->string('price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('loan_deduction')->nullable();
            $table->string('loan_purpose')->nullable();
            $table->string('sarak_khat')->nullable();
            $table->string('shikkha_khat')->nullable();
            $table->string('grower_khat')->nullable();
            $table->string('kollyan_khat')->nullable();
            $table->string('other_khat')->nullable();
            $table->string('total_deduction')->nullable();
            $table->string('net_total')->nullable();
            $table->string('net_cane_weight')->nullable();
            $table->string('amount_sugar')->nullable();
            $table->string('remaining_loan_amount')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('mis_reports');
    }
};
