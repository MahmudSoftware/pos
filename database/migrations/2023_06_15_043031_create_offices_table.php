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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('prefix')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('type')->comment('Head Office -> 1, Mill Office -> 2, Millzone -> 3');
            $table->string('address')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('offices');
    }
};
