<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Make extends Eloquent
{
    use HasFactory;

    // protected $table = 'makes';
    
    protected $with = ['models', 'images'];

    protected $fillable = [
        'name', 'slug'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function models()
    {
        return $this->hasMany(Model::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
