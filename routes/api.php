<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:api')->group(function () {

    Route::get('/profile', function(Request $request) {
        return $request->user();
   });




});

//Route::apiResource('tasks', TaskController::class);
Route::get('/v1/tasks/list', [TaskController::class, 'list']);

// List Tasks
Route::get('/v1/tasks', [TaskController::class, 'list']);

// Create Task
Route::post('/v1/tasks', [TaskController::class, 'storeApi']);

// Update Task
Route::put('/v1/tasks/{task}', [TaskController::class, 'updateApi']);

// Delete Task
Route::delete('/v1/tasks/{task}', [TaskController::class, 'destroyApi']);


