<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(LocationTableSeeder::class);
         $this->call(AdminTableSeeder::class);
         $this->call(AgentTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(ContractTypesTableSeeder::class);
         $this->call(PriceTypesTableSeeder::class);
         $this->call(PropertyTypeSeeder::class);
         $this->call(PropertyCategorySeeder::class);
         $this->call(DesignationTableSeeder::class);
    }
}
