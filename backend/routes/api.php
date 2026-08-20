<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
Route::middleware('web')->group (function(){
    Route::post('/register', [AuthController::class,'register']);
    Route::post('/login', [AuthController::class,'login']);
    Route::middleware('auth')->group(function(){
        Route::resource('/tasks', TaskController::class);
        Route::get('/user',[AuthController::class,'user']);
        Route::post('/logout',[AuthController::class,'logout']);
       
    });
     Route::get('/get-csrf-token', [AuthController::class,'getCsrfToken']);  
Route::get('/', function () {
    return response()->json(['status' => 'API is running']);
});});