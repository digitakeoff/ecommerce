<?php

namespace App\Listeners;

use App\Events\ModelCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class ProcessModelImage
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
        $folder = explode('\\', $event->namespace);
        $folder = strtolower($folder[count($folder) - 1]);
        $path = '/app/public/'.$folder;
        if(!file_exists(storage_path($path)))
            mkdir(storage_path($path));
        $model = $event->namespace::find($event->model_id);

        $image = $model->slug.'.'.pathinfo($event->temp_path, PATHINFO_EXTENSION);
        Storage::move('/'.$event->temp_path, $path.'/'.$image);
        // Storage::deleteDirectory('/app/public/temp_dir');
        // return $image;
    }

}
