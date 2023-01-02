<?php

namespace App\Http\Controllers;

use App\Interfaces\CarRepositoryInterface;
use App\Models\Image;
use App\Models\Car;
use App\Models\Make;
use App\Models\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Events\ModelCreated;

class CarController extends Controller
{
   
    public function __construct()
    {
        $this->middleware(['auth'])->except(['show', 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->routeIs('admin.*'))
            return view('admin.car.index', ['cars' => Car::all()]);
        return view('car.index', ['cars' => Car::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->routeIs('admin.*'))
            return view('admin.car.create');
        return view('car.create');
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
            'images' => ['required'],
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
            'transmission' => ['required', 'string', 'max:255'],
            'bodytype' => ['required', 'string', 'max:255']
        ]);
 
        $images = json_decode($request->images);

        $name = Str::title($request->year.' '.Make::find($request->make)->name.' '.Model::find($request->model)->name);
        $slug = Str::slug($name, '-');

        $name_exist = Car::where('name', '=', $name)->get();
        $slug = count($name_exist)? $slug. '-' .count($name_exist) + 1 : $slug;
        
        $data = [];
        $props = (new Car)->getFillables();

        foreach($props as $prop)
            $data[$prop] = $request->input($prop);
        
        $data['slug'] = $slug;
        $data['name'] = $name;
        $data['images'] = json_encode($images);
        $data['make_id'] = (int)$request->make;
        $data['model_id'] = (int)$request->model;
        $data['state_id'] = (int)$request->state;
        $data['city_id'] = (int)$request->city;
        $data['bodytype_id'] = (int)$request->bodytype;
        $data['user_id'] = $request->user()->id;
        $data['main_image_index'] = $request->image_index || 0;

        
        $car = Car::create($data);
        event(new ModelCreated(get_class($car), $car->id, $images));

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
        if(request()->routeIs('admin.*'))
            return view('admin.car.show', ['car'=>$car]);
        return view('car.show', ['car'=>$car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        if(request()->routeIs('admin.*'))
            return view('admin.car.edit', ['car'=>$car]);
        return view('car.edit', ['car'=>$car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */

    // private function name()
    // {
    //     $name = Str::title($request->year.' '.Make::find($request->make)->name.' '.Model::find($request->model)->name);
    //     return $name
    // }
    public function update(Request $request, Car $car)
    {
        $name = Str::title($request->year.' '.Make::find($request->make||$car->make_id)->name.' '.Model::find($request->model||$car->model_id)->name);

        $props = (new Car)->getFillables();

        foreach($props as $prop){
            if($request->has($prop) && $request->filled($prop)){
                $car->fill([$prop => $request->input($prop)]);
                $car->fill(['name' => $name]);
            }
        }

        if($request->has('images') && $request->filled('images')){
            $images = json_decode($request->images);
            event(new ModelCreated(get_class($car), $car->id, $images));
        }

        $car->save();

        if($request->expectsJson())
            return response()->json(['data'=>'Car edited']);
            // return response()->json($request);
        else 
            return redirect()->back();
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
