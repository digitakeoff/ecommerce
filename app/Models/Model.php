<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    use HasFactory;

    protected $with = ['image'];

    protected $fillable = [
        'name', 'slug', 'make_id', 'image'
    ];

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

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
}
