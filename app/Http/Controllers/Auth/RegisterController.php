<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['nullable', 'image', 'max:2048'], // Add validation for the image
        ]);
    }

    protected function create(array $data)
    {
        $imagePath = null;

        // Check if an image has been uploaded
        if (isset($data['image'])) {
            // Get the uploaded file
            $image = $data['image'];
            // Define the path to save the image
            $imagePath = 'users/' . time() . '_' . $image->getClientOriginalName();
            // Move the image to the specified folder
            $image->move(public_path('users'), $imagePath);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $imagePath, // Save the image path to the database
        ]);
    }
}
