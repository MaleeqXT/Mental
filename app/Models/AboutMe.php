<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    protected $fillable = [
        'user_id', 'name', 'profession', 'endorsement_status', 'personal_statement',
        'phone', 'email', 'website', 'primary_location', 'additional_location',
        'availability_description', 'new_client', 'online_sessions', 'intro_call',
        'intro_for_clients', 'video_intro_desc', 'video1_url', 'video2_url',
        'gallery_image_description', 'image1', 'identity'
    ];
}
