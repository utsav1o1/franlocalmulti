<?php

use Illuminate\Database\Seeder;

class PriceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priceTypes = [
            ['heading' => 'From'],
            ['heading' => 'From (off the plan)'],
            ['heading' => 'Fixed Price'],
            ['heading' => 'Contact us for pricing'],
        ];

        DB::table('price_types')->insert($priceTypes);
    }
}
