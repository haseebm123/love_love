<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

// use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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


    public function images(){
        return $this->hasMany(Image::class,'user_id','id');
    }

    

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user_intrest()
    {
        return $this->hasMany(UserIntrest::class, 'user_id', 'id')->select('intrest_id','user_id');
    }


    public function user_medical_condition()
    {
        return $this->hasMany(UserMedicalCondition::class, 'user_id', 'id')->select('medical_condition_id','user_id');
    }

    public function sentHeart()
    {
        return $this->hasMany(Heart::class, 'sender_id');
    }

    public function receivedHeart()
    {
        return $this->hasMany(Heart::class, 'receiver_id');
    }


}
