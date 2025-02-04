<?php

use App\Http\Controllers\AI\AIController;
use Illuminate\Support\Facades\Route;

Route::get('/ss-ai/opportunity-description', [AIController::class, 'generateOpportunityDescription'])->name('ss-ai.opportunity-description');
Route::get('/test', [AIController::class, 'generateOpportunityDescription'])->name('ss-ai.opportunity-description');

