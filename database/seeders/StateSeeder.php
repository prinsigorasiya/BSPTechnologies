<?php
// database/seeders/StateSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{ 

    public function run()
    {
        State::create(['name' => 'Gujarat', 'country_id' => 1]);
        State::create(['name' => 'Maharashtra', 'country_id' => 1]);
        State::create(['name' => 'New York', 'country_id' => 2]);
        State::create(['name' => 'New Jersey', 'country_id' => 2]);
        // Add more states as needed
    }
}
