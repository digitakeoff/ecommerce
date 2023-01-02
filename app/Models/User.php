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

    // protected $with = ['meta'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'role',
        'slug',
        'phone',
        'state',
        'city',
        'address',
        'password'
    ];

    public function getFillables(){
        return $this->fillable;
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
        'role'
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

    // protected function password(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn ($value) => Hash::make($value),
    //     );
    // }

    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::title($value),
        );
    }
}
