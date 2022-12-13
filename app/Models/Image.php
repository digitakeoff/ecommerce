<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManagerStatic as ImageProcessor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'src', 'path', 'sizes', 'imageable_id', 'imageable_type'
    ];

    CONST SIZES = [
        'x_small'   => 50,
        'small'     => 200,
        'medium'    => 400,
        'large'     => 600,
    ];
    
    public function imageable()
    {
        return $this->morphTo();
    }

    protected $hidden = [
        'imageable_id', 'imageable_type', 'created_at', 'updated_at'
    ];

    protected static function boot()
    {
        if(!defined('DS'))
            define('DS', DIRECTORY_SEPARATOR);
        parent::boot();
        static::created(function ($image) {
            if($image->imageable_type == 'App\Models\Car'){
                $folder = explode(DS, $image->path);
                $image_name = $folder[count($folder) - 1];
                $folder = strtolower($folder[count($folder) - 2]);
                $storage_path = "public/$folder/";
                $o_path = DS.'app'.DS.'public'.DS.$folder.DS;
                
                $sizes = [];
            
                foreach(self::SIZES as $key => $size){
                    $path = $o_path.$key.'_'.$image_name;
                    $src = $storage_path.$key.'_'.$image_name;

                    ImageProcessor::make(storage_path($image->path))
                    ->resize($size, $size)->save(storage_path($path));

                    $sizes[] = [
                        'src' => Storage::url($src),
                        'path' => $path
                    ];

                    // $path = $o_path;
                }

                $image->sizes = $sizes;
                $image->save();
            }
        });
    }
}
