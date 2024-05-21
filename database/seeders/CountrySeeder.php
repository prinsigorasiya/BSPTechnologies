<?php
// database/seeders/CountrySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run()
    {
        Country::create(['name' => 'india']);
        Country::create(['name' => 'us']);
        // Add more countries as needed
    }
}

