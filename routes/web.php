<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::redirect('/', '/landing');

// Task 7 (Anindya) — Register (insert form), Login, Manage profile (view page)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'show'])
    ->middleware('auth')
    ->name('profile.show');


Route::get('/landing', function () {
    $features = [
        ['icon' => '🤝', 'title' => 'Borrow for free', 'text' => 'Need a book or a tool for a week? Borrow it from a fellow student instead of buying new.'],
        ['icon' => '🏷️', 'title' => 'Rent out your items', 'text' => 'List the things you rarely use and earn a little from what would otherwise sit idle.'],
        ['icon' => '⭐', 'title' => 'Share with trust', 'text' => 'Ratings, reviews, and admin moderation keep every exchange safe and fair.'],
    ];

    $steps = [
        ['title' => 'Register', 'text' => 'Sign up with your full name, Student ID, and campus email.'],
        ['title' => 'Complete your profile', 'text' => 'Add your phone number, campus pickup point, and a short bio.'],
        ['title' => 'Start sharing', 'text' => 'Explore items near you, send a request, or list your first item.'],
    ];

    return view('landing', compact('features', 'steps'));
})->name('landing');
