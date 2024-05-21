<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;

class LocationController extends Controller
{
    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->pluck('name', 'id');
        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->pluck('name', 'id');
        return response()->json($cities);
    }
}
