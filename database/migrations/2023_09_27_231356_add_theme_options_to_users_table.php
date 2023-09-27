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
            $table->string('theme_dark_logo')->nullable();
            $table->string('theme_light_logo')->nullable();
            $table->string('theme')->nullable();
            $table->string('theme_button_color')->nullable();
            $table->string('theme_text_color')->nullable();
            $table->string('theme_line_color')->nullable();
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
            $table->dropColumn('theme_dark_logo');
            $table->dropColumn('theme_light_logo');
            $table->dropColumn('theme');
            $table->dropColumn('theme_button_color');
            $table->dropColumn('theme_text_color');
            $table->dropColumn('theme_line_color');
        });
    }
};
