<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('profiles', ProfileController::class);

Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/list', [PostController::class, 'list']);
Route::get('/posts/list/{id}', [PostController::class, 'show']);
Route::put('/posts/list/{id}', [PostController::class, 'update']);
Route::delete('/posts/list/{id}', [PostController::class, 'destroy']);
