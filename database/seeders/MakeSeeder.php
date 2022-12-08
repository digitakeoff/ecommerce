<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('makes')->insert([
            ['name' => 'Audi', 'slug' => 'audi', 'image'=>'/make/audi.png'],
            ['name' => 'BMW', 'slug' => 'bmw', 'image'=>'/make/bmw.png'],
            ['name' => 'Cadillac', 'slug' => 'cadillac', 'image'=>'/make/cadillac.png'],
            ['name' => 'Chevrolet', 'slug' => 'chevrolet', 'image'=>'/make/chevrolet.png'],
            ['name' => 'Dodge', 'slug' => 'dodge', 'image'=>'/make/dodge.png'],
            ['name' => 'Ford', 'slug' => 'ford', 'image'=>'/make/ford.png'],
            ['name' => 'Honda', 'slug' => 'honda', 'image'=>'/make/honda.png'],
            ['name' => 'Jeep', 'slug' => 'minivans', 'image'=>'/make/minivan.png'],
            ['name' => 'Mercedes', 'slug' => 'pickup', 'image'=>'/make/pickup.png'],
            ['name' => 'Nissan', 'slug' => 'sedans', 'image'=>'/make/sedan.png'],
            ['name' => 'Toyota', 'slug' => 'suv', 'image'=>'/make/suv.png'],
            ['name' => 'Volkswagen', 'slug' => 'volkswagen', 'image'=>'/make/volkswagen.png']
        ]);
    }
}
