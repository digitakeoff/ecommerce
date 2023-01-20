<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $with = ['state', 'city'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'role',
        'slug',
        'phone',
        'state_id',
        'city_id',
        'address',
        'password'
    ];

    public function getFillables(){
        return $this->fillable;
    }

    public function getFullName(){
        return $this->first_name .' '.$this->last_name;
    }

    public function meta()
    {
        return $this->morphMany(Meta::class, 'metable');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    

    protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::title($value),
            get: fn ($value) => Str::title($value),
        );
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::title($value),
            get: fn ($value) => Str::title($value),
        );
    }
}
