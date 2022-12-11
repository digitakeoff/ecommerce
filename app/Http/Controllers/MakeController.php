<?php

namespace App\Http\Controllers;

use App\Models\Make;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Events\ModelCreated;

class MakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makes = Make::all();
        if(request()->expectsJson())
            return response()->json($makes);
        else
            return view('admin.make.index', ['makes' => $makes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.make.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name'  => ['required', 'string', 'unique:makes', 'max:255'],
            'image' => ['required', 'string', 'max:255']
        ]);

        $name = Str::title($request->name);
        $slug = Str::slug(Str::lower($request->name), '-');
        
        $make = Make::create([
            'name' => $name,
            'slug' => $slug,
        ]);

        event(new ModelCreated(get_class($make), $make->id, [$request->image]));

        if($request->expectsJson())
            return response()->json($make);
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function show(Make $make)
    {
        return response()->json($make);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function edit(Make $make)
    {
        return view('admin.make.edit', ['make' => $make]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Make $make)
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'image' => ['required', 'string', 'max:255']
        ]);

        $name = Str::title($request->name);
        $slug = Str::slug(Str::lower($request->name), '-');
        $req_image = json_decode($request->image);

        $image = $req_image;
        if(!is_string($image))
            $image = $this->store_image($slug, $request->image, 'makes');

        
        $make->update([
            'name' => $name,
            'slug' => $slug,
            'image' => $image
        ]);

        if($request->expectsJson())
            return response()->json($make);
        else
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function destroy(Make $make)
    {
        $make->delete();
        return redirect()->back();
    }
}
