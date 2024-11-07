<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileEmail extends Model
{
    //
    protected $table = 'user_emails';

    protected $fillable = ['user_id', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
