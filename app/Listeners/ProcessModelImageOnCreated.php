<?php

namespace App\Listeners;

use App\Events\ModelCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class ProcessModelImageOnCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ModelCreated  $event
     * @return void
     */
    public function handle(ModelCreated $event)
    {
        // if($event->imageable == 'App\Models\Car'){
            if(!defined('DS'))
                define('DS', DIRECTORY_SEPARATOR);
            $folder = explode('\\', $event->namespace);
            $folder = strtolower($folder[count($folder) - 1]);
            $storage_path = "public/$folder";
            $o_path = DS.'app'.DS.'public'.DS.$folder.DS;
            $img_path = 'public'.DS.$folder.DS;
            if(!file_exists(storage_path($o_path)))
                mkdir(storage_path($o_path));

            $model = $event->namespace::find($event->model_id);
        
            foreach($event->temp_path as $temp_path){
                $image = $model->slug.'.'.pathinfo($temp_path, PATHINFO_EXTENSION);

                $path = $img_path.$image;
                $src = $storage_path.'/'.$image; 
                Storage::move($temp_path, $path);

                $model->images()->create([
                    'src' => Storage::url($src),
                    'path' => $o_path.$image
                ]);
            }
        // }
    }

}
