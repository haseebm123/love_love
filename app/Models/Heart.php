<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heart extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user associated with the Heart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_sender()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function user_receiver()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }



}
