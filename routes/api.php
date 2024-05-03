<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MedicationController;
use App\Http\Controllers\Api\CustomerController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/customers/', [CustomerController::class, 'store'])->name('store');

Route::prefix('customers')
    ->name('customers.')
    ->group(function (){
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        //Route::post('/', [CustomerController::class, 'store'])->name('store');
        Route::get('/{customer}', [CustomerController::class, 'show'])->name('show');
        Route::put('/{customer}', [CustomerController::class, 'update'])->name('update');
        Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('destroy');
    });

Route::prefix('medications')
    ->name('medications.')
    ->group(function () {
        Route::get('/', [MedicationController::class, 'index'])->name('index');
        Route::post('/', [MedicationController::class, 'store'])->name('store');
        Route::get('/{medication}', [MedicationController::class, 'show'])->name('show');
        Route::put('/{medication}', [MedicationController::class, 'update'])->name('update');
        Route::delete('/{medication}', [MedicationController::class, 'destroy'])->name('destroy');
    });

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
