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

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
