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
        Schema::table('paddle_subscriptions', function (Blueprint $table) {
            $table->string('subscription_id')->unsigned()->change();
            $table->string('plan_id')->nullable()->change();
            $table->text('update_url')->nullable()->change();
            $table->text('cancel_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
