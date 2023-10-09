<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'fullname' => 'admin',
            'email' => 'david.fadhil11@gmail.com',
            'password' => Hash::make('0'),
            'prev' => 'all',
            'user_type' => '0',
        ]);
    }
}
