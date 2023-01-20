<?php

namespace App\Http\Controllers;

use App\Models\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\ModelCreated;
use Illuminate\Support\Facades\Storage;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Model::all();
        if(request()->expectsJson())
            return response()->json($models);
        else
            return view('admin.model.index', ['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.model.create');
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
            'name'  => ['required', 'string', 'unique:models', 'max:255'],
            'make' => ['required', 'string', 'max:255']
        ]);

        $name = Str::title($request->name);
        $slug = Str::slug(Str::lower($request->name), '-');
        
       
        $data = [
            'name' => $name,
            'slug' => $slug,
            'make_id' => $request->make
        ];
        
        $model = Model::create($data);

        if($request->has('image') && $request->filled('image'))
            event(new ModelCreated(get_class($model), $model->id, [$request->image]));

        if($request->expectsJson())
            return response()->json($model);
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function show(Model $model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $model)
    {
        return view('admin.model.edit', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $model)
    {
        
        $props = $model->getFillables();

        foreach($props as $prop){
            if($request->filled($prop)){
                $model->fill([$prop => $request->input($prop)]);
            }
        }

        if($request->filled('images')){
            $images = json_decode($request->images);
            event(new ModelCreated(get_class($model), $models->id, $images));
        }

        $model->save();

        if($request->expectsJson())
            return response()->json($model);
        else
            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        $model->delete();
        return redirect()->back();
    }
}
