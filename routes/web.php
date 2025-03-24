<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ExerciseController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/complete-profile', [UserController::class, 'completeProfile'])->name('users.complete-profile');
    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('users.update-profile');
    Route::get('/program/{program}', [ProgramController::class, 'show'])->name('program.show');
    Route::get('/session/{session}', [SessionController::class, 'show'])->name('session.show');
    Route::patch('/session/{session}/{status_exercise}', [SessionController::class, 'completeExercise'])->name('exercise-session.complete');
    Route::patch('/session/{session}', [SessionController::class, 'completeSession'])->name('user-session.complete');

    Route::resource('programs', ProgramController::class)->except(['show']);
    Route::resource('sessions', SessionController::class)->except(['show']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';