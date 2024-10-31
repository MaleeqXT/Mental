<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutMeSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('about_me')->insert([
            'name' => 'John Doe',
            'profession' => 'Software Developer',
            'endorsement_status' => true,
            'personal_statement' => 'Experienced developer with a focus on web applications.',
            'phone' => '123-456-7890',
            'email' => 'johndoe@example.com',
            'website' => 'https://johndoe.com',
            'primary_location' => 'New York',
            'additional_location' => 'Remote',
            'availability_description' => 'Available for new projects',
            'new_client' => 'Yes',
            'online_sessions' => 'Yes',
            'intro_call' => 'Free 15-minute intro call',
            'intro_for_clients' => 'Welcome new clients',
            'video_intro_desc' => 'Video introduction about services',
            'video1_url' => 'https://example.com/video1',
            'video2_url' => 'https://example.com/video2',
            'gallery_image_description' => 'Portfolio images',
            'image1' => 'https://example.com/image1.jpg',
            'identity' => 'Certified Professional',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
