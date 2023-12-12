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
        Schema::table('project_blocks', function (Blueprint $table) {
            $table->string('admin_name')->after('name')->nullable();
        });
        \DB::table('project_blocks')
            ->whereNotNull('name')
            ->update(['admin_name' => \DB::raw('name')]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_blocks', function (Blueprint $table) {
            $table->dropColumn('admin_name');
        });
    }
};
