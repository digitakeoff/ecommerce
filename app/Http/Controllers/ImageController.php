<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth'])->except(['show', 'index']);
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(auth()->check())
        return response()->json(Image::where('user_id', request()->user()->id)->where('imageable_id', 0)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('image')->isValid()) {
            $path = $request->image->store('/public/files/');
            $src = Storage::url($path);
            $image = Image::create([
                'src' => $src,
                'path' => $path
            ]);
            return response()->json($image);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $path = '/app/public/'.$request->folder;
        if(!file_exists(storage_path($path)))
            mkdir(storage_path($path), 0777, true);

        $image = $slug.'.'.pathinfo($image->path, PATHINFO_EXTENSION);
        $image_path = $path.'/'.$image;
        $url = Storage::url($image_path);
        Storage::move('/'.$image->path, $image_path);
        // Storage::deleteDirectory('/app/public/temp_dir');
        $image->update([
            'url' => $url,
            'path' => $image_path,
            'imageable_id' => $imageable_image,
        ]);
        return $image;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();
        if(request()->expectsJson())
            return response()->json(['image' => 'deleted']);
        else
            return redirect()->back();
    }
}
