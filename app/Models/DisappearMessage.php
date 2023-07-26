<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisappearMessage extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user associated with the DisappearMessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sender()
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

    public function receiver()
    {
        return $this->hasOne(User::class, 'id', 'receiver_id');
    }
}
