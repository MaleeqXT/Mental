<?php

namespace App\Http\Controllers;

use App\Models\PersonalStatement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalStatementController extends Controller
{
 

    public function update(Request $request)
    {
        // Validate the bio field
        $request->validate([
            'bio' => 'nullable|string|max:5000',
        ]);

        // Update or create the personal statement for the logged-in user
        PersonalStatement::updateOrCreate(
            ['user_id' => Auth::id()],
            ['bio' => $request->bio]
        );

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Personal statement updated successfully.');
    }
}
