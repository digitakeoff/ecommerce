<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodytype extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'image', 'description'
    ];

    protected $with = [
        // 'cars', 
        'images'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
