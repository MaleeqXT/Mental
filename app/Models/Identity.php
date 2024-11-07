<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    // Define the table name (if it's not the plural of the model name)
    protected $table = 'identity';

    // Specify the fields that can be mass assigned
    protected $fillable = [
        'user_id',
        'age',
        'gender',
        'faith',
        'dob_month',
        'dob_day',
        'dob_year',
    ];
}
