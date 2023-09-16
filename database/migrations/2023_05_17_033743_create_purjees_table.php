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
        // if (Schema::hasTable('purjees')) return;
        Schema::create('purjees', function (Blueprint $table) {
            $table->id();
            $table->integer('office_id')->nullable();
            $table->integer('purjeeno')->nullable();
            $table->integer('purjeenoMe')->nullable();
            $table->integer('grower_id')->nullable();
            $table->string('issuedate')->nullable();
            $table->string('deliverdate')->nullable();
            $table->integer('purjee_weight')->nullable();
            $table->string('sms_senddate')->nullable();
            $table->string('status')->nullable();
            $table->string('send_req')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('paymentsms_senddate')->nullable();
            $table->string('isMisReported')->nullable();
            $table->string('season')->nullable();
            $table->string('is_printed')->nullable();
            $table->string('gazette_list_id')->nullable();
            $table->string('mills_code')->nullable();
            $table->string('center_code')->nullable();
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
        Schema::dropIfExists('purjees');
    }
};
