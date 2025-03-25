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
       
        $allExercisesCompleted = true;

        for ($i = 1; $i <= 6; $i++) {
            $statusField = 'status_exercise_' . $i;
            if ($userSession[$statusField] === 'pending') {
                $allExercisesCompleted = false;
            }
        }

        if ($allExercisesCompleted) {
            $userSession->update(['status' => 'completed']);
        }

        $userSession->save();

        return redirect()->route('session.show', $userSession->id);
    }

}
