<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Olivia',
            'email' => 'olivia123@yopmail.com',
            'password' => Hash::make('olivia123')
        ]);
        DB::table('users')->insert([
            'name' => 'Juan',
            'email' => 'juan123@yopmail.com',
            'password' => Hash::make('juan123')
        ]);
    }
}
