<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Make extends Eloquent
{
    use HasFactory;

    // protected $table = 'makes';
    
    protected $with = ['models'];

    protected $fillable = [
        'name', 'slug', 'image'
    ];

    public function models()
    {
        return $this->hasMany(Model::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
