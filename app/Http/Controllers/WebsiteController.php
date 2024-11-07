<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfileWebsite;
class WebsiteController extends Controller
{
    //
    public function update(Request $request)
    {
        // Validate the website URL
        $request->validate([
            'website' => 'nullable|url|max:255',
        ]);

        // Update or create the website for the logged-in user
        ProfileWebsite::updateOrCreate(
            ['user_id' => Auth::id()],
            ['website' => $request->website]
        );

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Website updated successfully.');
    }
}
