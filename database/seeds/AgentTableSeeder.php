<?php

use Illuminate\Database\Seeder;

class AgentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agents = [
            ['location_id'=>1,'first_name' => 'Agent', 'last_name'=>'User', 'email_address' => 'agent@email.dev', 'password' => bcrypt('password'), 'is_active' => '1'],
        ];

        DB::table('agents')->insert($agents);
    }
}
