<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProfileWebsite extends Model
{
    //
    use HasFactory;

    protected $table = 'user_websites';

    protected $fillable = [
        'user_id',
        'website',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
