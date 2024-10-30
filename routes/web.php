<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Models\User;

Route::middleware(['auth'])->group(function () {
    Route::resource('services', ServiceController::class);
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    });
});

Route::get('/', function () {
    return view('mentalpress');
});
Route::post('/profile/update', function (Request $request) {
    // Validate input fields
    $request->validate([
        'user_id' => 'required|integer|exists:users,id',
        'bio' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'title' => 'nullable|string|max:100',
    ]);

    // Find the user and update
    $user = User::findOrFail($request->user_id);
    $user->update($request->only('bio', 'phone', 'title'));

    return response()->json([
        'bio' => $user->bio,
        'phone' => $user->phone,
        'title' => $user->title,
    ]);
})->name('profile.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/about',[ProfileController::class,'about'])->name('profiles.index');

Route::get('/test', function () {
    return view('test');
});