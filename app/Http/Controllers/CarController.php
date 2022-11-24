<?php

namespace App\Http\Controllers;

use App\Interfaces\CarRepositoryInterface;
use App\Models\Image;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('car.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'condition' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'make' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'vin' => ['required', 'string', 'max:255'],
            'ext_color' => ['required', 'string', 'max:255'],
            'int_color' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:255'],
            'mileage' => ['required', 'string', 'max:255'],
            'vehicle_drive' => ['required', 'string', 'max:255'],
            'transmission' => ['required', 'string', 'max:255'],
            'body_type' => ['required', 'string', 'max:255']
        ]);
 
        $images = $request->images;
        $slug = Str::slug(Str::lower($request->name), '-');

        $name = Str::title($request->name);

        $name_exist = Car::where('name', '=', $name)->get();
        $slug = count($name_exist)? $slug. '-' .count($name_exist) + 1 : $slug;
        
        $props = (new Car)->props;
        
        $data = [];
        foreach($props as $prop){
            $data[$prop] = $request->input($prop);
        }
        $data['slug'] = $slug;
        $data['images'] = $images;
        // $data['user_id'] = $request->user()->id;
        $data['user_id'] = 1;
        $data['make_id'] = $request->make;
        $data['model_id'] = $request->model;
        $data['main_image_index'] = $request->image_index;

        
        $car = Car::create($data);

        if($request->expectsJson())
            return response()->json(['data'=>'Car added']);
        else 
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
