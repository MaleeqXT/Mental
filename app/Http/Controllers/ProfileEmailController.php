<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileEmail;
use Illuminate\Support\Facades\Auth;

class ProfileEmailController extends Controller
{
    //
    
    
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:user_emails,email,' . Auth::id() . ',user_id',
        ]);

        ProfileEmail::updateOrCreate(
            ['user_id' => Auth::id()],
            ['email' => $request->email]
        );

        return redirect()->back()->with('success', 'Email updated successfully.');
    }
}
