<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BodyTypeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('bodytypes')->insert([
            ['name' => '4WD-AWD', 'slug' => '4wd-awd', 'image'=>'/body_type/4WD-AWD.png'],
            ['name' => 'Coupes', 'slug' => 'coupes', 'image'=>'/body_type/coupes.png'],
            ['name' => 'Convertible', 'slug' => 'convertible', 'image'=>'/body_type/convertible.png'],
            ['name' => 'Crossover', 'slug' => 'crossover', 'image'=>'/body_type/crossover.png'],
            ['name' => 'Diesel', 'slug' => 'diesel', 'image'=>'/body_type/diesel.png'],
            ['name' => 'Hybrid', 'slug' => 'hybrid', 'image'=>'/body_type/hybrid.png'],
            ['name' => 'Luxury', 'slug' => 'luxury', 'image'=>'/body_type/luxury.png'],
            ['name' => 'Minivans', 'slug' => 'minivans', 'image'=>'/body_type/minivan.png'],
            ['name' => 'Pickup', 'slug' => 'pickup', 'image'=>'/body_type/pickup.png'],
            ['name' => 'Sedan', 'slug' => 'sedans', 'image'=>'/body_type/sedan.png'],
            ['name' => 'SUV', 'slug' => 'suv', 'image'=>'/body_type/suv.png'],
            ['name' => 'Wagons', 'slug' => 'wagons', 'image'=>'/body_type/wagons.png']
        ]);
    }
}
