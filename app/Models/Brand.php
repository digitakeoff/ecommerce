<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Brand extends Eloquent
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
