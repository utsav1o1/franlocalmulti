<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('agent_id');
            $table->string('full_name')->nullable()->default(null);
            $table->string('email_address')->nullable()->default(null);
            $table->string('phone_number')->nullable()->default(null);
            $table->text('message')->nullable()->default(null);
            $table->nullableTimestamps();

            $table->foreign('agent_id')->references('id')->on('agents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_messages');
    }
}
