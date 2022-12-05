<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store_image($slug, $image, $path)
    {

        $req_image = json_decode($image);
        if(is_string($req_image))
            return;
        if(!file_exists(storage_path('/app/public/'.$path)))
            mkdir(storage_path('/app/public/'.$path), 0777, true);
        $image = $slug.'.'.pathinfo($req_image->path, PATHINFO_EXTENSION);
        Storage::move('/'.$req_image->path, '/public/'.$path.'/'.$image);
        Storage::deleteDirectory('/app/public/temp_dir');
        return $image;
    }
}
