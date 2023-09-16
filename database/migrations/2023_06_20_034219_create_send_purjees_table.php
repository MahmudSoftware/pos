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
        Schema::create('send_purjees', function (Blueprint $table) {
            $table->id();
            $table->integer('office_id')->nullable();
            $table->unsignedBigInteger('center_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('purjee_id')->nullable();
            $table->string('passbook_number')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('centers')->onDelete('set null');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('set null');
            $table->foreign('purjee_id')->references('id')->on('purjees')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('send_purjees');
    }
};
