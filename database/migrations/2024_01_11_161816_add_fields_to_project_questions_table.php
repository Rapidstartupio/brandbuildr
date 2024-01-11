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
        Schema::table('project_questions', function (Blueprint $table) {
            $table->string('strategy_document_output_string')->nullable();
            $table->string('section_learning_question')->nullable();
            $table->string('project_learning_question')->nullable();
            $table->string('bullet_format')->nullable();
            $table->string('pmpt_ans_limit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_questions', function (Blueprint $table) {
            $table->dropColumn('strategy_document_output_string');
            $table->dropColumn('section_learning_question');
            $table->dropColumn('project_learning_question');
            $table->dropColumn('bullet_format');
            $table->dropColumn('pmpt_ans_limit');
        });
    }
};
