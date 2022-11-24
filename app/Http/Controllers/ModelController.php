<?php

namespace App\Http\Controllers;

use App\Models\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        return response()->json(Model::all());
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
            'name'  => ['required', 'string', 'unique:Models', 'max:255'],
            'image' => ['required', 'string', 'max:255'],
            'make' => ['required', 'string', 'max:255']
        ]);

        $name = Str::title($request->name);
        $slug = Str::slug(Str::lower($request->name), '-');
        $req_image = json_decode($request->image);

        if(!file_exists(storage_path('/app/public/files/')))
            mkdir(storage_path('/app/public/files/'), 0777, true);
        $image = $slug.'.'.pathinfo($req_image->path, PATHINFO_EXTENSION);
        Storage::move('/'.$req_image->path, '/public/files/'.$image);
        $model = Model::create([
            'name' => $name,
            'slug' => $slug,
            'image' => $image,
            'make_id' => $request->make
        ]);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        //
    }
}
