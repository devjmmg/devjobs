<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationNewCandidateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [VacantController::class, 'index'])->middleware(['auth', 'verified', 'role.user'])->name('vacants.index');
Route::get('/vacants/create', [VacantController::class, 'create'])->middleware(['auth', 'verified'])->name('vacants.create');
Route::get('/vacants/{vacant}/edit', [VacantController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacants.edit');
Route::get('/vacants/{vacant}/show', [VacantController::class, 'show'])->name('vacants.show');

Route::get('/notifications', NotificationNewCandidateController::class)->middleware(['auth', 'verified', 'role.user'])->name('notifications.index');

Route::get('/candidates/{vacant}', [CandidateController::class, 'index'])->middleware(['auth', 'verified', 'role.user'])->name('candidates.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
