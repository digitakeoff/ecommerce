<?php

namespace App\Http\Controllers;

use App\Models\Bodytype;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BodytypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodytypes = bodytype::all();
        if(request()->expectsJson())
            return response()->json($bodytypes);
        else
            return view('admin.body.index', ['bodies' => $bodytypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.body.create');
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
            'name'  => ['required', 'string', 'unique:bodytypes', 'max:255'],
            'image' => ['required', 'string', 'max:255']
        ]);

        $name = Str::title($request->name);
        $slug = Str::slug(Str::lower($request->name), '-');
        // $image = json_decode($request->image);
        $req_image = json_decode($request->image);

        // if(!file_exists(storage_path('/app/public/bodys/')))
        //     mkdir(storage_path('/app/public/bodys/'), 0777, true);
        // $image = $slug.'.'.pathinfo($req_image->path, PATHINFO_EXTENSION);
        // Storage::move('/'.$req_image->path, '/public/bodys/'.$image);
        // $image = $this->store_image($slug, $request->image, 'bodys');
        if(!is_string($req_image)){
            $image = $this->store_image($slug, $request->image, 'bodytypes');
        }
        $body = Bodytype::create([
            'name' => $name,
            'slug' => $slug,
            'image' => $image
        ]);

        if($request->expectsJson())
            return response()->json($body);
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bodytype  $bodytype
     * @return \Illuminate\Http\Response
     */
    public function show(Bodytype $bodytype)
    {
        return response()->json($bodytype);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bodytype  $bodytype
     * @return \Illuminate\Http\Response
     */
    public function edit(Bodytype $bodytype)
    {
        return view('admin.body.edit', ['body' => $bodytype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bodytype  $bodytype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bodytype $bodytype)
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
            $image = $this->store_image($slug, $request->image, 'bodytypes');

        
        $bodytype->update([
            'name' => $name,
            'slug' => $slug,
            'image' => $image
        ]);

        if($request->expectsJson())
            return response()->json($bodytype);
        else
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bodytype  $bodytype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bodytype $bodytype)
    {
        $bodytype->delete();
        return redirect()->back();
    }
}
