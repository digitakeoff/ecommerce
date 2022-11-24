<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'price', 'description', 'state', 'images', 'city', 'address',
        'user_id', 'condition', 'main_image_index', 'make_id', 'model_id', 'vin', 'year',
        'ext_color', 'int_color', 'vehicle_drive', 'transmission', 'body_type'
    ];

    public $props = [
        'name', 'slug', 'price', 'description', 'state', 'images', 'city', 'address',
        'user_id', 'condition', 'main_image_index', 'make_id', 'model_id', 'vin', 'year',
        'ext_color', 'int_color', 'vehicle_drive', 'transmission', 'body_type'
    ]; 

    protected $hidden = [
        'main_image_index', 'user_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($car) {
            // $car->slug = $car->generateSlug($car->name);
            // $slug = $car->slug;
            
            $images = json_decode($car->images);

            $i=0;
            $car_images = [];
            foreach($images as $image){
                $i++;
                $image_name = $car->slug.'-'.$i.'.'.pathinfo($image->path, PATHINFO_EXTENSION);
                if(!file_exists(storage_path('/app/public/files/')))
                    mkdir(storage_path('/app/public/files/'), 0777, true);
                $img_main = Image::make(storage_path('/app/'.$image->path))
                ->save(storage_path('/app/public/files/'.$image_name));
                $img_xs = Image::make(storage_path('/app/'.$image->path))
                ->resize(50, 50)->save(storage_path('/app/public/files/'.'xs_'.$image_name));
                $img_sm = Image::make(storage_path('/app/'.$image->path))
                ->resize(150, 150)->save(storage_path('/app/public/files/'.'sm_'.$image_name));
                $img_lg = Image::make(storage_path('/app/'.$image->path))
                ->resize(300, 300)->save(storage_path('/app/public/files/'.'lg_'.$image_name));
                $car_images[] = [
                    'main' => $image_name,
                    'xs' => 'xs_'.$image_name,
                    'sm' => 'sm_'.$image_name,
                    'lg' => 'lg_'.$image_name,
                ];
                // Storage::move(storage_path('/app/public/temp_dir/'.$image), '/public/files/'.$image_name);
            }
            
            // $car->slug = $slug;
            $car->images = $car_images;

            $car->save();
        });
    }
}
