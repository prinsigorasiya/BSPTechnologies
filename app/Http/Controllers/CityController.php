<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function citiesByState($stateId)
    {
        $cities = City::where('state_id', $stateId)->get();
        return response()->json($cities);
    }
}