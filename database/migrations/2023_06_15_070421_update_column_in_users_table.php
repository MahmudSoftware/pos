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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('code')->nullable()->after('id');
            $table->string('first_name')->after('code');
            $table->string('last_name')->after('first_name');
            $table->string('phone')->after('last_name');
            $table->string('user_type')->after('phone')->nullable();
            $table->unsignedBigInteger('office_id')->nullable()->after('user_type');
            $table->unsignedBigInteger('depertment_id')->nullable()->after('office_id');
            $table->unsignedBigInteger('designation_id')->nullable()->after('depertment_id');
            $table->string('address')->nullable()->after('user_type');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('set null');
            $table->foreign('depertment_id')->references('id')->on('depertments')->onDelete('set null');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->dropColumn('code');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('phone');
            $table->dropColumn('user_type');
            $table->dropColumn('address');
            $table->dropForeign(['office_id']);
            $table->dropColumn('office_id');
            $table->dropForeign(['depertment_id']);
            $table->dropColumn('depertment_id');
            $table->dropForeign(['designation_id']);
            $table->dropColumn('designation_id');
        });
    }
};
