<?php

use Illuminate\Support\Facades\Route;

// API routes (auto-prefixed with '/api')
Route::middleware('api')->group(function () {
    // Test route
    Route::get('/test', function () {
        return response()->json(['status' => 'API is working!']);
    });
    
    // Your task routes
    Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'index']);
    Route::post('/tasks', [\App\Http\Controllers\TaskController::class, 'store']);
    Route::put('/tasks/{task}', [\App\Http\Controllers\TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [\App\Http\Controllers\TaskController::class, 'destroy']);
});