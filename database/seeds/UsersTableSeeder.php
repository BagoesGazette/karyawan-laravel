<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
                'name'	=> 'Super Admin',
                'email'	=> 'superadmin@gmail.com',
                'password'	=> bcrypt('superadmin'),
                'role' => 'super-admin',
                'remember_token' => Str::random(100),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name'	=> 'Staf HR',
                'email'	=> 'stafhr@gmail.com',
                'password'	=> bcrypt('stafhr'),
                'role' => 'staf',
                'remember_token' => Str::random(100),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);

    }
}
