<?php

use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['property_type' => 'Apartment', 'slug'=>'apartment'],
            ['property_type' => 'Flat', 'slug'=>'flat'],
        ];

        DB::table('property_types')->insert($types);
    }
}
