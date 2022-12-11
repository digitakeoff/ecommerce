<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\Model;
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
        'name', 'slug', 'price', 'description', 'state', 'city', 'address',
        'user_id', 'condition', 'main_image_index', 'make_id', 'model_id', 'vin', 'year',
        'ext_color', 'int_color', 'vehicle_drive', 'transmission', 'body_type'
    ]; 

    protected $hidden = [
        'main_image_index', 'user_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
