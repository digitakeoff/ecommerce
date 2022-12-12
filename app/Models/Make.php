<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Make extends Eloquent
{
    use HasFactory;

    // protected $table = 'makes';
    
    protected $with = ['models', 'image'];

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

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        if ($this->id !== null) {
            return 'id';
        }
        // otherwise, return default
        return 'slug';
    }
}
