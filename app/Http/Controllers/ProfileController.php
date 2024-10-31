<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function about() {

     return view ('profiles.index');
    }


    public function update(Request $request)
    {
        // Validate input fields
        $request->validate([
            'bio' => 'string|max:255',
            'phone' => 'string|max:20',
            'title' => 'string|max:100',
        ]);

        // Update the authenticated user's profile fields
        auth()->user()->update([
            'bio' => $request->input('bio'),
            'phone' => $request->input('phone'),
            'title' => $request->input('title'),
        ]);

        // Redirect to profiles.index with a success message
        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully!');
    }
    
}
