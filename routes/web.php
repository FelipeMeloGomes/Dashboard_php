<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/', [UserController::class, 'dashboard'])->name('home');

    // Usuario
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');

    // Usuario Profile
    Route::put('/users/{user}/profile', [UserController::class, 'updateProfile'])->name('users.updateProfile');

    // Usuario Avatar
    Route::post('/users/{user}/avatar', [UserController::class, 'updateAvatar'])->name('users.avatar');

    // Usuario interesses
    Route::put('/users/{user}/interests', [UserController::class, 'updateInterests'])->name('users.updateInterests');

    // Usuario Cargos
    Route::put('/users/{user}/roles', [UserController::class, 'updateRoles'])->name('users.updateRoles');
});
