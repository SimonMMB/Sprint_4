<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
   return view('welcome');
});

Route::resource('users', UserController::class);
Route::get('/program/{program}', [ProgramController::class, 'show'])->name('program.show');
Route::get('/session/{session}', [SessionController::class, 'show'])->name('session.show');
?>