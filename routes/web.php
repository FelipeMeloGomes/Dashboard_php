<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');

    // Usuario
    Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    // Usuario Profile
    Route::put('/users/{user}/profile', [UserController::class, 'updateProfile'])->name('users.updateProfile');

    // Usuario interesses
    Route::put('/users/{user}/interests', [UserController::class, 'updateInterests'])->name('users.updateInterests');

    // Usuario Cargos
    Route::put('/users/{user}/roles', [UserController::class, 'updateRoles'])->name('users.updateRoles');

    Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');
});
