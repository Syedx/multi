<?php

namespace Database\Seeders;

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
            [
                'full_name' => 'Ashura Admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123@'),
                'role' => 'admin',
                'status' => 'active',
            ],

//      Vendor

            [
                'full_name' => 'Ashura Seller',
                'username' => 'Seller',
                'email' => 'seller@gmail.com',
                'password' => Hash::make('123@'),
                'role' => 'seller',
                'status' => 'active',
            ],

//      Customer

            [
                'full_name' => 'Ashura Customer',
                'username' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('123@'),
                'role' => 'customer',
                'status' => 'active',
            ],

        ]);
    }
}
