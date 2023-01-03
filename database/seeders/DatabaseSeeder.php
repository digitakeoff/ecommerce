<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // BodyTypeseeder::class,
            // MakeSeeder::class,
            LocationSeeder::class,
            AdminDataSeeder::class

        ]);
    }
}
