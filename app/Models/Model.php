<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    use HasFactory;

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


}
