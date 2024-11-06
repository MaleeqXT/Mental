<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\PersonalStatementController;

Route::middleware(['auth','verified'])->group(function () {
    Route::resource('services', ServiceController::class);
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    });
});


Route::get('/', function () {
    return view('mentalpress');
});

    
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/about', [ProfileController::class, 'about'])->name('profiles.index');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('user.update');



Route::middleware(['auth'])->group(function () {
    // Display personal statement
    Route::get('/profile/personal-statement', [PersonalStatementController::class, 'show'])->name('profile.personalStatement.show');

    // Update personal statement
    Route::post('/profile/personal-statement', [PersonalStatementController::class, 'update'])->name('profile.personalStatement.update');
});


Route::get('/test', function () {
    return view('test');
});