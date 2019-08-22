<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table){
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('contract_type_id')->unsigned();
            $table->integer('price_type_id')->unsigned();
            $table->integer('agent_id')->unsigned();
            $table->integer('location_id')->unsigned()->nullable()->default(null);
            $table->string('property_name')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->smallInteger('number_of_bedrooms')->nullable()->default(null);
            $table->smallInteger('number_of_bathrooms')->nullable()->default(null);
            $table->smallInteger('number_of_garages')->nullable()->default(null);
            $table->string('video_key')->nullable()->default(null);
            $table->longText('description')->nullable()->default(null);
            $table->longText('amenities')->nullable()->default(null);
            $table->string('floor_plan')->nullable()->default(null);
            $table->unsignedInteger('area')->default(0);
            $table->decimal('price', 10,2)->default(0);
            $table->decimal('price_to', 10, 2)->nullable();
            $table->float('latitude', 16,14)->default(0);
            $table->float('longitude', 17,14)->default(0);
            $table->smallInteger('zoom')->default(9);
            $table->unsignedInteger('view_count')->default(0);
            $table->enum('is_sold', [0,1])->default(0)->comment="0-not sold,1-sold";
            $table->enum('is_active', [0,1])->default(0)->comment="0-unpublished,1-published";
            $table->nullableTimestamps();

            $table->foreign('type_id')->references('id')->on('property_types');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('category_id')->references('id')->on('property_categories');
            $table->foreign('contract_type_id')->references('id')->on('contract_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
