<?php

use Illuminate\Database\Seeder;

class PropertyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['property_category' => 'Appartment', 'slug'=>'appartment'],
            ['property_category' => 'Business', 'slug'=>'business'],
            ['property_category' => 'Projects', 'slug'=>'projects'],
            ['property_category' => 'Residental', 'slug'=>'residental'],
        ];

        DB::table('property_categories')->insert($categories);
    }
}
