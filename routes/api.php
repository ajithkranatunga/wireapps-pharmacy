<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MedicationController;
use App\Http\Controllers\Api\CustomerController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('customers')
    ->name('customers.')
    ->group(function (){
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::post('/', [CustomerController::class, 'store'])->name('store');
        Route::get('/{customer}', [CustomerController::class, 'show'])->name('show');
        Route::put('/{customer}', [CustomerController::class, 'update'])->name('update');
        Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('destroy');
    });

Route::prefix('medications')
    ->name('medications.')
    ->group(function (){
        Route::get('/', [MedicationController::class, 'index'])->name('index');
        Route::post('/', [MedicationController::class, 'store'])->name('store');
        Route::get('/{medication}', [MedicationController::class, 'show'])->name('show');
        Route::put('/{medication}', [MedicationController::class, 'update'])->name('update');
        Route::delete('/{medication}', [MedicationController::class, 'destroy'])->name('destroy');
    });
