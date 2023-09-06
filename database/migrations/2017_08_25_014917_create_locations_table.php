<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('agent_id'); // Add this line for the agent relationship.
            $table->string('location_name')->nullable()->default(null);
            $table->integer('postal_code')->unsigned();
            $table->float('latitude', 16,14)->nullable()->default(null);
            $table->float('longitude', 17,14)->nullable()->default(null);
            $table->smallInteger('zoom')->nullable()->default(null);
            $table->nullableTimestamps();

             // Define the foreign key constraint.
             $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
