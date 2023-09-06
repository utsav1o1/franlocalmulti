<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('location_id');
            $table->integer('designation_id')->unsigned();
            $table->string('email_address')->nullable()->default(null);
            $table->string('password')->nullable()->default(null);
            $table->string('first_name')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->string('attachment')->nullable()->default(null);
            $table->string('phone_number')->nullable()->default(null);
            $table->string('mobile_number')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->integer('order_position')->unsigned()->default(0);
            $table->enum('is_active', [0,1])->default(0);
            $table->enum('is_core_member', [0,1])->default(0);
            $table->rememberToken();
            $table->nullableTimestamps();

            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('designation_id')->references('id')->on('designations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
