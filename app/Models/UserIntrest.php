<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIntrest extends Model
{
    use HasFactory;
    protected $guarded = [];


    /**
     * Get the user associated with the UserIntrest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function intrest()
    {
        return $this->hasOne(Intrest::class, 'id', 'intrest_id')->select('id','name');
    }
}
