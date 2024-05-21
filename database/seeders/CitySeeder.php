<?php
// database/seeders/CitySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder   {  
    public function run()
    {
        City::create(['name' => 'Ahmedabad', 'state_id' => 1]);
        City::create(['name' => 'Surat', 'state_id' => 1]);
        City::create(['name' => 'Vadodara', 'state_id' => 1]);
        City::create(['name' => 'Rajkot', 'state_id' => 1]);
        City::create(['name' => 'Pune', 'state_id' => 2]);
        City::create(['name' => 'Mumbai', 'state_id' => 2]);
        City::create(['name' => 'Nashik', 'state_id' => 2]);


        City::create(['name' => 'White Plains', 'state_id' => 3]);
        City::create(['name' => 'Buffalo', 'state_id' => 3]);
        City::create(['name' => 'Trenton', 'state_id' => 4]);
        City::create(['name' => 'Newark', 'state_id' => 4]);
        // Add more cities as needed
    }
}
