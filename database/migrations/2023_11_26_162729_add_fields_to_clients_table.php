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
        Schema::table('clients', function (Blueprint $table) {
            $table->string('company_logo')->nullable();
            $table->string('tag')->nullable();
            $table->string('tag_color')->default('#000000');
            $table->string('tag_bg_color')->default('#9BDAB4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('company_logo');
            $table->dropColumn('tag');
            $table->dropColumn('tag_color');
            $table->dropColumn('tag_bg_color');
        });
    }
};
