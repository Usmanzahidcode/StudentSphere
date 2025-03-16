<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Project\ApplicationController;
use App\Http\Controllers\Project\MessageController;
use App\Http\Controllers\Project\OpportunityController;
use App\Http\Controllers\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.homepage')->name('homepage');

// No auth needed routes
Route::group(['middleware' => 'guest'], function () {
    // Auth routes
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'submitRegistrationForm'])->name('register.submit');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'submitLoginForm'])->name('login.submit');
});

Route::group(['middleware' => 'authenticated'], function () {
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

    // Projects
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

    // Forum

    // Files
    Route::group(['prefix' => 'files'], function () {
        Route::get('{file}/download', [FileController::class, 'download'])->name('files.download')->withoutMiddleware(['authenticated']);
    });

    // Auth
    Route::get('/logout', [AuthController::class, 'submitLogout'])->name('logout.submit');

    // Public profile page
    Route::get('/profile/{user}', [ProfileController::class, 'profile'])->name('profile.show');

    // Account settings
    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        // GET Routes (Views)
        Route::get('/profile', [AccountController::class, 'profile'])->name('profile');
        Route::get('/background', [AccountController::class, 'background'])->name('background');
        Route::get('/password', [AccountController::class, 'password'])->name('password');
        Route::get('/projects', [AccountController::class, 'projects'])->name('projects');
        Route::get('/management', [AccountController::class, 'management'])->name('management');

        // POST Routes (Updates)
        Route::post('/profile/update', [AccountController::class, 'updateProfile'])->name('profile.update');
        Route::post('/background/update', [AccountController::class, 'updateBackground'])->name('background.update');
        Route::post('/password/update', [AccountController::class, 'updatePassword'])->name('password.update');
        Route::post('/projects/update', [AccountController::class, 'updateProjects'])->name('projects.update');
        Route::post('/management/update', [AccountController::class, 'updateManagement'])->name('management.update');

        Route::post('/account/deactivate', [AccountController::class, 'deactivate'])->name('deactivate');
        Route::delete('/account/delete', [AccountController::class, 'delete'])->name('delete');

    });

    // Admin side
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:admin'],], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Users Management
        Route::controller(UserController::class)->group(function () {
            Route::get('/users', 'index')->name('users');
            Route::get('/users/{user}', 'show')->name('users.show');
            Route::post('/users/{user}/ban', 'ban')->name('users.ban');
            Route::post('/users/{user}/unban', 'unban')->name('users.unban');
        });

        // Projects Management
        Route::controller(ProjectController::class)->group(function () {
            Route::get('/projects', 'adminIndex')->name('projects');
            Route::get('/projects/{project}', 'adminShow')->name('projects.show');
            Route::post('/projects/{project}/reject', 'abort')->name('projects.reject');
        });

        // Opportunities Management
        Route::controller(OpportunityController::class)->group(function () {
            Route::get('/opportunities', 'adminIndex')->name('opportunities');
            Route::get('/opportunities/{opportunity}', 'adminShow')->name('opportunities.show');
            Route::post('/opportunities/{opportunity}/approve', 'approve')->name('opportunities.approve');
            Route::post('/opportunities/{opportunity}/reject', 'reject')->name('opportunities.reject');
        });
    });
});
