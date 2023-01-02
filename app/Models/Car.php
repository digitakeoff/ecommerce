<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Car extends Eloquent
{
    use HasFactory;

    protected $with = ['images','make', 'model', 'city', 'state', 'bodytype'];

    protected $fillable = [
        'name', 'slug', 'price', 'drivetrain', 'mileage', 'fuel_type', 
        'state_id', 'city_id', 'address','user_id', 'condition', 'description', 
        'main_image_index', 'make_id', 'model_id', 'vin', 'year', 'ext_color', 
        'int_color', 'transmission', 'bodytype_id',
        'airbags', 'seats', 'doors', 'speed'
    ];

    public function getFillables(){
        return $this->fillable;
    }
    
    protected $hidden = [
        'user_id', 'state_id', 'city_id', 'make_id', 'model_id', 'bodytype_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function bodytype()
    {
        return $this->belongsTo(Bodytype::class);
    }

    public function model()
    {
        return $this->belongsTo(Model::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    protected function extColor(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value)
        );
    }

    protected function vin(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value)
        );
    }

    protected function intColor(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value)
        );
    }

}
