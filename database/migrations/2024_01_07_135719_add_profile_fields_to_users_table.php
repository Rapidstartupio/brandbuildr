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
            $table->string('phone_number')->nullable();
            $table->string('position')->nullable();
            $table->string('company_name')->nullable();
            $table->string('owner')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('zip_code')->nullable();
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
            $table->dropColumn('phone_number');
            $table->dropColumn('position');
            $table->dropColumn('company_name');
            $table->dropColumn('owner');
            $table->dropColumn('address');
            $table->dropColumn('website');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('street');
            $table->dropColumn('zip_code');
        });
    }
};
