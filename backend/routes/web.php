<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
Route::middleware('web')->group (function(){
    Route::post('/register', [AuthController::class,'register']);
    Route::post('/login', [AuthController::class,'login']);
    Route::middleware('auth')->group(function(){
        Route::resource('/tasks', TaskController::class);
        Route::get('/user',[AuthController::class,'user']);
        Route::post('/logout',[AuthController::class,'logout']);
       
    });
     Route::get('/get-csrf-token', [AuthController::class,'getCsrfToken']);  
     Route::get('/debug-session', function (Request $request) {
    return response()->json([
        'session_id' => $request->session()->getId(),
        'session_token' => $request->session()->token(),
    ]);
});
Route::get('/', function () {
    return response()->json(['status' => 'API is running']);
});});