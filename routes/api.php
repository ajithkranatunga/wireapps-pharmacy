<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('users')
    ->name('users.')
    ->group(function (){
        Route::get('/', [\App\Http\Controllers\Api\UserController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Api\UserController::class, 'store'])->name('store');
        Route::get('/{user}', [\App\Http\Controllers\Api\UserController::class, 'show'])->name('show');
        Route::put('/{user}', [\App\Http\Controllers\Api\UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [\App\Http\Controllers\Api\UserController::class, 'destroy'])->name('destroy');
        Route::post('/login', \App\Http\Controllers\Api\UserController::class, 'login')
            ->middleware('guest:sanctum')
            ->name('login');
    });
