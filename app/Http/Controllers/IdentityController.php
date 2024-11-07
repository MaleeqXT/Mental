<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identity;
use Illuminate\Support\Facades\Auth;

class IdentityController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'age' => 'nullable|integer|min:0|max:120',
            'gender' => 'nullable|string|max:10',
            'faith' => 'nullable|string|max:50',
            'dob_month' => 'nullable|integer|min:1|max:12',
            'dob_day' => 'nullable|integer|min:1|max:31',
            'dob_year' => 'nullable|integer|min:1900|max:' . date('Y'),
        ]);

        // Try to find an existing identity record for the logged-in user
        $identity = Identity::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'faith' => $request->input('faith'),
                'dob_month' => $request->input('dob_month'),
                'dob_day' => $request->input('dob_day'),
                'dob_year' => $request->input('dob_year'),
            ]
        );

        // Redirect to the profile page with a success message
        return redirect('/profile/about')->with('success', 'Identity data saved/updated successfully.');
    }
}