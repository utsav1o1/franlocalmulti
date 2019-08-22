<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            ['full_name' => 'Admin User', 'email_address' => 'admin@email.dev', 'password' => bcrypt('password'), 'is_active' => '1'],
        ];

        DB::table('admins')->insert($admins);
    }
}
