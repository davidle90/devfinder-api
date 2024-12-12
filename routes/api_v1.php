<?php

use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('projects', ProjectController::class)->except(['update']);
    Route::put('projects/{project}', [ProjectController::class, 'replace']);
    Route::patch('projects/{project}', [ProjectController::class, 'update']);

    Route::apiResource('users', UserController::class)->except(['update']);
});
