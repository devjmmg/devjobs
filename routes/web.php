<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [VacantController::class, 'index'])->middleware(['auth', 'verified'])->name('vacants.index');
Route::get('/vacants/create', [VacantController::class, 'create'])->middleware(['auth', 'verified'])->name('vacants.create');
Route::get('/vacants/{vacant}/edit', [VacantController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacants.edit');
Route::get('/vacants/{vacant}/show', [VacantController::class, 'show'])->middleware(['auth', 'verified'])->name('vacants.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
