<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalStatement extends Model
{
    //
    protected $fillable = [
        'user_id',
        'bio',
    ];
}
