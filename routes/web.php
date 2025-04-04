<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TrainingSessionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Exercise;

require __DIR__.'/auth.php';

Route::redirect('/', '/login');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/account-deleted', function () {
    return view('auth.account-deleted');
})->name('account.deleted');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/programs/create', [ProgramController::class, 'create'])->name('programs.create');
    Route::post('/programs', [ProgramController::class, 'store'])->name('programs.store');
    Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
    Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');
    Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');
    Route::get('/training-sessions/{trainingSession}', 
    [TrainingSessionController::class, 'show'])->name('training_sessions.show');
    Route::patch('/training-sessions/{trainingSession}/exercises/{sessionExercise}', 
    [TrainingSessionController::class, 'update'])->name('training_sessions.exercises.complete');
    Route::view('/test-chart', 'test-chart');
    Route::get('/exercises/{exercise}/progress', function(Exercise $exercise) {
        return view('exercises.progress', ['exercise' => $exercise]);
    })->name('exercises.progress');
    Route::get('/delete-account-form', function () {
        return view('profile.partials.delete-user-form');
    })->name('delete.account.form');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

?>