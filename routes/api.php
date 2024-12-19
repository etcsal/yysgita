<?php

use App\Http\Controllers\admin\kontenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\kandidat\KandidatController;
use App\Http\Middleware\KandidatMiddleware;
use Illuminate\Support\Facades\Route;

// Route::apiResource('kontens', kontenController::class);
// Route::get('/kandidat',function(){
//     dd('test');
// });
// Route::get('/dashboard',[KandidatController::class, 'index'])->middleware(KandidatMiddleware::class);

// Route::post('login',[LoginController::class, 'login']);