<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'akan',
            'last_name' => 'udosen',
            'email' => 'udosenakane@gmail.com',
            'password' => Hash::make('microsoft'),
            'role' => 'admin',
            'slug' => 'akan-udosen',
            'phone' => '07082683086',
            'address' => 'Ikorodu',
            'city_id' => 39,
            'state_id' => 7
        ]);
    }
}
