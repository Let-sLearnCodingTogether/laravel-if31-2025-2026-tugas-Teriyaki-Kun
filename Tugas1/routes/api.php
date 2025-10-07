<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('guest')->group(function(){
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);

});

Route::middleware(['auth:sanctum','role:admin'])->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/users',[UserManagementController::class,'index']);
    Route::get('/role',[UserManagementController::class,'role']);
    Route::apiResource('/movies',MoviesController::class);
});

Route::middleware(['auth:sanctum','role:user'])->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/role',[UserManagementController::class,'role']);
    Route::get('/movies',[MoviesController::class,'index']);
    Route::get('/movies/{movie}',[MoviesController::class,'show']);
});



Route::get('/user', function(Request $request){
    return $request->user();
})->middleware('auth:sanctum');
