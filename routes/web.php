<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\DefaultController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('auth/callback::google', [GoogleAuthController::class, 'callbackGoogle']);


Route::get('/', function () {
    return view('user.index');
});

Route::get('article/', function () {
    return view('user.article');
});

Route::get('404/', function () {
    return view('user.404');
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

Route::fallback([DefaultController::class, 'error']);

require __DIR__ . '/auth.php';