<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['full_name' => 'Frontend User', 'email_address' => 'frontend@email.dev', 'password' => bcrypt('password'), 'is_active' => '1'],
        ];

        DB::table('users')->insert($users);
    }
}
