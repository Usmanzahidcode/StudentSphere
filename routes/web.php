<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Project\ApplicationController;
use App\Http\Controllers\Project\MessageController;
use App\Http\Controllers\Project\OpportunityController;
use App\Http\Controllers\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.homepage')->name('homepage');


Route::group(['middleware' => 'authenticated'], function () {
    // Pages

    // Opportunity
    Route::group(['prefix' => 'opportunities'], function () {
        Route::get('/', [OpportunityController::class, 'index'])->name('opportunities.index');
        Route::get('/create', [OpportunityController::class, 'create'])->name('opportunities.create');
        Route::post('/', [OpportunityController::class, 'store'])->name('opportunities.store');
        Route::get('/{opportunity}', [OpportunityController::class, 'show'])->name('opportunities.show');
        Route::get('/{opportunity}/edit', [OpportunityController::class, 'edit'])->name('opportunities.edit');
        Route::match(['PUT', 'PATCH'], '/{opportunity}', [OpportunityController::class, 'update'])->name('opportunities.update');
        Route::delete('/{opportunity}', [OpportunityController::class, 'destroy'])->name('opportunities.delete');

        // Application routes
        Route::group(['prefix' => '{opportunity}/applications'], function () {
            Route::get('/', [ApplicationController::class, 'index'])->name('applications.index');
            Route::get('/create', [ApplicationController::class, 'create'])->name('applications.create');
            Route::post('/', [ApplicationController::class, 'store'])->name('applications.store');
            Route::get('/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
            Route::match(['PUT', 'PATCH'], '/{application}', [ApplicationController::class, 'update'])->name('applications.update');
            Route::get('/{application}', [ApplicationController::class, 'show'])->name('applications.show');
            Route::delete('/{application}', [ApplicationController::class, 'destroy'])->name('applications.delete');
        });

    });

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/create/{opportunity}', [ProjectController::class, 'create'])
            ->name('projects.create');

        Route::post('/create/{opportunity}', [ProjectController::class, 'store'])
            ->name('projects.store');

        Route::get('/{project}', [ProjectController::class, 'show'])
            ->name('projects.show');

        Route::delete('/{project}/remove-member', [ProjectController::class, 'removeMember'])
            ->name('projects.remove-member');

        Route::patch('/{project}/abort', [ProjectController::class, 'abortProject'])->name('projects.abort');
        Route::patch('/{project}/complete', [ProjectController::class, 'completeProject'])->name('projects.complete');

        // Chat
        Route::post('/{project}/messages', [MessageController::class, 'store'])->name('messages.store');
    });

    // Files
    Route::group(['prefix' => 'files'], function () {
        Route::get('{file}/download', [FileController::class, 'download'])->name('files.download')->withoutMiddleware(['authenticated']);
    });

    // Auth
    Route::get('/logout', [AuthController::class, 'submitLogout'])->name('logout.submit');

    // Profile page
    Route::get('/profile/{user}', [ProfileController::class, 'profile'])->name('profile.show');

    // Account settings
    Route::middleware(['auth'])->group(function () {
        Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::get('/account/security', [AccountController::class, 'security'])->name('account.security');
        Route::get('/account/preferences', [AccountController::class, 'preferences'])->name('account.preferences');
    });


});

Route::group(['middleware' => 'guest'], function () {
    // Auth routes
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'submitRegistrationForm'])->name('register.submit');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'submitLoginForm'])->name('login.submit');
});
