<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'User', 'email' => 'user@user.com', 'password' => Hash::make('user'), 'role_id' => '1'],
            ['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin'), 'role_id' => '3'],
        ]);
    }
}
