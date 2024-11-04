<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::middleware(['auth','verified'])->group(function () {
    Route::resource('services', ServiceController::class);
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    });
});


Route::get('/', function () {
    return view('mentalpress');
});

Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/about', [ProfileController::class, 'about'])->name('profiles.index');

Route::get('/test', function () {
    return view('test');
});
