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
        $user = auth()->user();
        $user->update([
            'bio' => $request->input('bio'),
            'phone' => $request->input('phone'),
            'title' => $request->input('title'),
        ]);
    
        // Return JSON response if the request is AJAX
        if ($request->ajax()) {
            return response()->json([
                'bio' => $user->bio,
                'phone' => $user->phone,
                'title' => $user->title,
            ]);
        }
    
        // Redirect for non-AJAX requests
        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully!');
    }
        
}
