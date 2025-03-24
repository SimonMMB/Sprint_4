<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSession;

class SessionController extends Controller
{
    public function show(UserSession $session)
    {
        return view('session.show', compact('session'));
    }

    public function completeExercise(int $userSessionId, int $index)
    {
        $userSession = UserSession::findOrFail($userSessionId);
        $statusField = 'status_exercise_' . ($index + 1);
        $userSession->update([$statusField => 'completed']);

        return redirect()->route('session.show', $userSession->id);
        /*
        // Verificar si todos los ejercicios de la sesión están completados
        $userSession = UserSession::whereHas('trainingSessions', function ($query) use ($exercise) {
            $query->where('exercise_id', $exercise->id);
        })->first();

        if ($userSession && $userSession->trainingSessions->every(fn($ts) => $ts->exercise->status === 'completed')) {
            $userSession->update(['status' => 'completed']);
        }

        return back()->with('success', 'Ejercicio marcado como completado');
        */
    }

    public function completeSession(int $userSessionId)
    {
        $userSession = UserSession::findOrFail($userSessionId);
        $userSession->update(['status' => 'completed']);
        /*
        // Verificar si todos los ejercicios de la sesión están completados
        $userSession = UserSession::whereHas('trainingSessions', function ($query) use ($exercise) {
            $query->where('exercise_id', $exercise->id);
        })->first();

        if ($userSession && $userSession->trainingSessions->every(fn($ts) => $ts->exercise->status === 'completed')) {
            $userSession->update(['status' => 'completed']);
        }

        return back()->with('success', 'Ejercicio marcado como completado');
        */
        return redirect()->route('session.show', $userSession->id);
    }
}
