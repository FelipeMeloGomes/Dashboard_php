<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;

Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/', [UserController::class, 'dashboard'])->name('home');

    // Usuário
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'delete'])->name('delete');

        // users customizados
        Route::put('/{user}/profile', [UserProfileController::class, 'updateProfile'])->name('updateProfile');
        Route::post('/{user}/avatar', [UserProfileController::class, 'updateAvatar'])->name('avatar');
        Route::put('/{user}/interests', [UserProfileController::class, 'updateInterests'])->name('updateInterests');
        Route::put('/{user}/roles', [UserProfileController::class, 'updateRoles'])->name('updateRoles');
    });
});
