<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMedicalCondition extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function medical_condition()
    {
        return $this->hasOne(MedicalCondition::class, 'id', 'medical_condition_id')->select('id','name');
    }
}
