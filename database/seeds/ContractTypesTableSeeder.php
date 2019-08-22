<?php

use Illuminate\Database\Seeder;

class ContractTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contractTypes = [
            ['heading' => 'Off the Plan'],
            ['heading' => 'Under Contract'],
            ['heading' => 'House and Land Package'],
        ];

        DB::table('contract_types')->insert($contractTypes);
    }
}
