<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['location_name' => 'Sydney', 'postal_code'=>2001, 'latitude'=>-33, 'longitude'=>151, 'zoom'=>9],
        ];

        DB::table('locations')->insert($locations);
    }
}
