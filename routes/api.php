<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/list', [PostController::class, 'list']);
Route::get('/posts/list/{post}', [PostController::class, 'show']);
Route::put('/posts/list/{post}', [PostController::class, 'update']);
Route::delete('/posts/list/{post}', [PostController::class, 'destroy']);
