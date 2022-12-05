<?php

namespace App\Observers;

use App\Models\Make;

class MakeObserver
{
    /**
     * Handle the Make "created" event.
     *
     * @param  \App\Models\Make  $make
     * @return void
     */
    public function created(Make $make)
    {
        $req_image = json_decode($make->image);

        if(!file_exists(storage_path('/app/public/makes/')))
            mkdir(storage_path('/app/public/makes/'), 0777, true);
        $image = $make->slug.'.'.pathinfo($make->image->path, PATHINFO_EXTENSION);
        Storage::move('/'.$make->image->path, '/public/makes/'.$image);
        Storage::deleteDirectory('/app/public/temp_dir');
        $make->save();
    }

    /**
     * Handle the Make "updated" event.
     *
     * @param  \App\Models\Make  $make
     * @return void
     */
    public function updated(Make $make)
    {
        
    }

    /**
     * Handle the Make "deleted" event.
     *
     * @param  \App\Models\Make  $make
     * @return void
     */
    public function deleted(Make $make)
    {
        //
    }

    /**
     * Handle the Make "restored" event.
     *
     * @param  \App\Models\Make  $make
     * @return void
     */
    public function restored(Make $make)
    {
        //
    }

    /**
     * Handle the Make "force deleted" event.
     *
     * @param  \App\Models\Make  $make
     * @return void
     */
    public function forceDeleted(Make $make)
    {
        //
    }
}
