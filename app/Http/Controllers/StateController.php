<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;


class StateController extends Controller
{
    public function index()
    {
        return response()->json(State::all());
    }

    public function show(State $state)
    {
        return response()->json($state);
    }

}
