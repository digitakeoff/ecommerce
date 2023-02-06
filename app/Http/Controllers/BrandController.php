<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Events\ModelCreated;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        if(request()->expectsJson())
            return response()->json($brands);
        else
            return view('admin.brand.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name'  => ['required', 'string', 'unique:brands', 'max:255'],
            'image' => ['required', 'string', 'max:255']
        ]);

        $name = Str::title($request->name);
        $slug = Str::slug(Str::lower($request->name), '-');
        
        $brand = Brand::create([
            'name' => $name,
            'slug' => $slug,
        ]);

        event(new ModelCreated(get_class($brand), $brand->id, [$request->image]));

        if($request->expectsJson())
            return response()->json($brand);
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return response()->json($brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
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
            $image = $this->store_image($slug, $request->image, 'brands');

        
        $brand->update([
            'name' => $name,
            'slug' => $slug,
            'image' => $image
        ]);

        if($request->expectsJson())
            return response()->json($brand);
        else
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->back();
    }
}
