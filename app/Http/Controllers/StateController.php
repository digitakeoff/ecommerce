<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;


class StateController extends Controller
{
    public function index()
    {
        return response()->json(State::all());
    }

    public function show(State $state)
    {
        $cities = City::where('state_id', $state->id)->get();
        $state['cities'] = $cities;
        return response()->json($state);
    }

}
