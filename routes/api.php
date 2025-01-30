<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ss-ai/opportunity-description', function (Request $request) {
    // For now, just return a random response
    $query = $request->query('query'); // Retrieve query parameter

    // Dummy data based on query (just as an example)
    $responses = [
        'AI can help you with detecting diseases' => 'AI can analyze medical images and help identify diseases.',
        'Tech project collaboration' => 'This tech project focuses on developing an AI-based platform.',
        'Business plan generation' => 'This system helps you build business plans based on market data.',
    ];

    // Return random response based on the query or fallback response
    $response = $responses[$query] ?? 'Here is a sample response from AI.';

    return response()->json(['response' => $response]);
})->name('ss-ai.opportunity-description');

