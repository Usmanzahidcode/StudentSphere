<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Project\OpportunityController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.homepage')->name('homepage');


Route::group(['middleware' => 'authenticated'], function () {
    // Pages

    // Opportunity
    Route::group(['prefix' => 'opportunities'], function (){
        Route::get('/', [OpportunityController::class, 'index']);
        Route::get('/create', [OpportunityController::class, 'create']);
        Route::post('/', [OpportunityController::class, 'store'])->name('opportunities.store');
    });
    // Auth
    Route::get('/logout', [AuthController::class, 'submitLogout'])->name('logout.submit');
});

Route::group(['middleware' => 'guest'], function () {
    // Auth routes
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'submitRegistrationForm'])->name('register.submit');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'submitLoginForm'])->name('login.submit');
});
