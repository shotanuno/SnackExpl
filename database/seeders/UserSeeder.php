<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'administrator',
                'email' => 'admin@test',
                'email_verified_at' => now(),
                'password' => bcrypt('adminpass'),
                'remember_token' => Str::random(10),
            ]);
        
        DB::table('users')->insert([
                'name' => 'user1',
                'email' => 'user1@test',
                'email_verified_at' => now(),
                'password' => bcrypt('user1pass'),
                'remember_token' => Str::random(10),
            ]);
        
        DB::table('users')->insert([
                'name' => 'user2',
                'email' => 'user2@test',
                'email_verified_at' => now(),
                'password' => bcrypt('user2pass'),
                'remember_token' => Str::random(10),
            ]);
    }
}
