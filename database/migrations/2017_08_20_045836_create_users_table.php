<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email_address')->nullable()->default(null);
            $table->string('password')->nullable()->default(null);
            $table->string('full_name')->nullable()->default(null);
            $table->string('provider')->nullable()->default(null);
            $table->string('provider_id')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->rememberToken();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
