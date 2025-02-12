<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Project\OpportunityController;
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
    });

    Route::resource('test', OpportunityController::class);

    // Files
    Route::group(['prefix' => 'files'], function () {
        Route::get('{file}/download', [FileController::class, 'download'])->name('files.download')->withoutMiddleware(['authenticated']);
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
