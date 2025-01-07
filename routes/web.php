<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// Pages
Route::view('/', 'pages.homepage');

// Opportunity


// Auth routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'submitRegistrationForm'])->name('register.submit');
