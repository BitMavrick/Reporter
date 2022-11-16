<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication Routes
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('auth/callback::google', [GoogleAuthController::class, 'callbackGoogle']);

// Home Routes
Route::get('/', [HomeController::class, 'home'])->name('home');

// Profile Routes
Route::get('profile/{username}/', [ProfileController::class, 'profile'])->name('profile');
Route::post('update/', [ProfileController::class, 'update'])->name('update.profile');

Route::get('article/', function () {
    return view('user.article');
});

Route::get('category/', function () {
    return view('user.category');
});

Route::get('about/', function () {
    return view('user.about');
});

Route::get('privacy/', function () {
    return view('user.privacy-policy');
});

Route::get('contact/', function () {
    return view('user.contact');
});

Route::get('super/', [AdminController::class, 'home'])->name('super.home');
Route::get('super/users/', [AdminController::class, 'users'])->name('super.users');


Route::get('404/', function () {
    return view('user.404');
})->name('404');
// Route::fallback([DefaultController::class, 'error']);

require __DIR__ . '/auth.php';