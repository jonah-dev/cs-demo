<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password_hash');
            $table->string('password_plain');
            $table->boolean('superadmin');
            $table->string('shop_name');
            $table->string('card_brand');
            $table->integer('card_last_four');
            $table->timestamp('trial_starts_at');
            $table->timestamp('trial_ends_at');
            $table->string('shop_domain');
            $table->boolean('is_enabled');
            $table->string('billing_plan');

            $table->dropColumn('email_verified_at');
            $table->dropColumn('password');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
