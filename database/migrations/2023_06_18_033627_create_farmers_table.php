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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('center_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->string('code')->unique()->nullable();
            $table->string('first_name')->nullable();
            $table->string('bn_first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('bn_last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('bn_father_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('pass_book_number')->nullable();
            $table->string('nid')->nullable();
            $table->boolean('phone_status')->default(1);
            $table->boolean('status')->default(1);
            $table->boolean('is_loan')->default(1);
            $table->double('remain_loan')->nullable();
            $table->double('invested_loan_amount')->nullable();
            $table->double('remain_cart')->nullable();
            $table->double('total_cane')->nullable();
            $table->double('supplied_cane')->nullable();
            $table->double('supplied_cane_cart')->nullable();
            $table->string('village')->nullable();
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('centers')->onDelete('CASCADE');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmers');
    }
};
