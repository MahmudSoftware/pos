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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->integer('office_id')->nullable();
            $table->unsignedBigInteger('center_id')->nullable();
            $table->string('name')->unique()->nullable();
            $table->boolean('status')->default(1);
            $table->string('cic_name')->nullable();
            $table->string('cic_number')->nullable();
            $table->string('cda_name')->nullable();
            $table->string('cda_number')->nullable();
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('centers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
};
