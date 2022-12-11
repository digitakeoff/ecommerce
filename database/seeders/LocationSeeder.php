<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use App\Models\State;
use App\Models\City;


class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $file = json_decode(file_get_contents(base_path('states-and-cities.json')), true);

        foreach($file as $state){
            $data = State::create([
                'name' => $state['name'],
                'slug' => Str::slug(Str::lower($state['name']))
            ]);

            foreach($state['cities'] as $city){
                City::create([
                    'name' => $city,
                    'slug' => Str::slug(Str::lower($city)),
                    'state_id' => $data->id
                ]);
            }
        }
    }
}
