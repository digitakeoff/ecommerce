<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    use HasFactory;

    protected $with = ['images'];

    // protected $table = 'models';

    protected $fillable = [
        'name', 'slug', 'make_id', 'image'
    ];


    public function getFillables(){
        return $this->fillable;
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
}
