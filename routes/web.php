<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\HomeController;
use App\Models\Exercise;

Route::view('/test-chart', 'test-chart');
Route::get('/', function () {
    return view('auth.login');
})->name('login');


Route::controller(UserController::class)->group(function () {
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/program', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/store-program', [ProgramController::class, 'store'])->name('program.store');
    Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
    Route::get('/my-programs', [ProgramController::class, 'index'])->name('programs.index');
    Route::get('/program/{program}', [ProgramController::class, 'show'])->name('program.show');
    Route::get('/session/{session}', [SessionController::class, 'show'])->name('session.show');
    Route::patch('/session/{session}/{session_exercise}', [SessionController::class, 'update'])->name('session-exercise.complete');
    Route::get('/exercises/{exercise}/progress', function(Exercise $exercise) {
        return view('exercise.progress', ['exercise' => $exercise]);
    })->name('exercises.progress');
    
    

    Route::resource('programs', ProgramController::class)->except(['show']);
    Route::resource('sessions', SessionController::class)->except(['show']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';