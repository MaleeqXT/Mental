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
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/about',[ProfileController::class,'about'])->name('profiles.index');

Route::get('/test', function () {
    return view('test');
});