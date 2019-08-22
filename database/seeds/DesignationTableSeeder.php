<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
            ['designation' => 'Principal'],
            ['designation' => 'Sales Director'],
            ['designation' => 'Sales Executive'],
            ['designation' => 'Sales Representative'],
            ['designation' => 'Sales Agent'],
        ];

        DB::table('designations')->insert($designations);
    }
}
