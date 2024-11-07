<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PersonalBio;
use App\Models\PersonalStatement;
use App\Models\ProfileEmail;
use App\Models\ProfileWebsite;
use App\Models\Identity;
class ProfileController extends Controller
{
    public function about()
    {
        // Retrieve the user's PersonalBio or create a new instance
        $personalBio = PersonalBio::firstOrNew(['user_id' => Auth::id()]);
        $personalStatement = PersonalStatement::firstOrCreate(
            ['user_id' => Auth::id()],
            ['bio' => ''] // Default empty bio if it doesn’t exist
        );
        $userEmail = ProfileEmail::firstOrCreate(
            ['user_id' => Auth::id()],
            ['email' => Auth::user()->email]
        );
        $website = ProfileWebsite::firstOrCreate(
            ['user_id' => Auth::id()],
            ['website' => 'https://example.com'] // Default website if it doesn’t exist
        );
        $identity = Identity::firstOrNew(['user_id' => Auth::id()]); // Retrieve or create Identity record
        return view('profiles.index', compact('personalBio','personalStatement','userEmail','website','identity'));
    }
    


    public function update(Request $request)
    {
        // Validate the form input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'credentials' => 'nullable|string|max:255',
        ]);
    
        // Update or create the personal bio
        $personalBio = PersonalBio::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'title' => $request->title,
                'credentials' => $request->credentials,
            ]
        );
    
        // Redirect back to the profile page with a success message
        return redirect()->route('profiles.index')->with('success', 'Personal information updated successfully.');
    }
    
}
