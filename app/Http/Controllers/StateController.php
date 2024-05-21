<?php
namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function statesByCountry($countryId)
    {
        $states = State::where('country_id', $countryId)->get();
        return response()->json($states);
    }
}