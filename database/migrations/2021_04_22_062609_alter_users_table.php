<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('monthly_cost')->nullable()->change();
            $table->integer('family_num')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->integer('postal_code')->nullable()->change();
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
            $table->integer('monthly_cost')->nullable(false)->change();
            $table->integer('family_num')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->integer('postal_code')->nullable(false)->change();
        });
    }
}
