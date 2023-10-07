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
        Schema::create('user_project_progress', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('category'); //section or block
            $table->integer('id_of_category')->unsigned();
            $table->boolean('done')->default(0);
            $table->dateTime('validate_at')->nullable();
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
        Schema::dropIfExists('user_project_progress');
    }
};
