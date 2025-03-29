<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\UserSession;
use App\Models\SessionExercise;
use App\Models\Exercise;
use App\Models\User;
use DateTime;

class UserSessionService
{
    public function createUserProgram(User $user, int $training_frequency, int $training_duration, string $start_date, string $estimated_end_date)
    {
        $totalWeeks = $training_duration * 4;
        $sessionsPerWeek = $training_frequency;
        $totalSessions = $sessionsPerWeek * $totalWeeks;

        $program = Program::create([
            'training_frequency' => $training_frequency,
            'training_duration' => $training_duration,
            'user_id' => $user->id,
            'start_date' => $start_date,
            'estimated_end_date' => $estimated_end_date,
            'total_sessions' => $totalSessions,
            'completed_sessions' => 0,
            'remaining_sessions' => $totalSessions
        ]);
       
        $this->createUserSessions($user, $program);
    }

    public function createUserSessions(User $user, Program $program)
    {
        $totalWeeks = $program->training_duration * 4;
        $sessionsPerWeek = $program->training_frequency;
        $startDate = new DateTime($program->start_date);
        $sessionCounter = 1;

        for ($week = 0; $week < $totalWeeks; $week++) {

            for ($session = 0; $session < $sessionsPerWeek; $session++) {

                while (in_array($startDate->format('N'), [6, 7])) {
                    $startDate->modify('+1 day');
                }

                $userSession = UserSession::create([
                    'number_of_session' => $sessionCounter,
                    'program_id' => $program->id,
                    'user_id' => $user->id,
                    'estimated_date' => $startDate,
                    'status' => 'pending',
                    'comments' => null
                ]);

                $this->assignExercisesToSession($userSession);
                $startDate->modify('+1 day');
                $sessionCounter++;
            }
        }
    }

    private function assignExercisesToSession(UserSession $userSession)
    {
        $muscleGroups = Exercise::select('muscle_group')->distinct()->pluck('muscle_group'); 
        $exercises = collect();

        foreach ($muscleGroups as $group) {
            $exercise = Exercise::where('muscle_group', $group)->inRandomOrder()->first();
            
            if ($exercise) {
                $exercises->push($exercise);
            }
        }

        foreach ($exercises as $exercise) {
            SessionExercise::create([
                'user_session_id' => $userSession->id,
                'exercise_id' => $exercise->id,
                'status' => 'pending'
            ]);
        }
    }

    public function completeExercisesAndSession(Request $request, int $userSessionId, int $sessionExerciseId)
    {
        $userSession = UserSession::findOrFail($userSessionId);
        $sessionExercise = SessionExercise::findOrFail($sessionExerciseId);

        if ($sessionExercise->status != 'completed') {
            $request->validate([
                'lifted_weight' => 'required|integer|min:1'
            ]);
            $sessionExercise->update([
                'lifted_weight' => $request->lifted_weight,
                'status' => 'completed'
            ]);
        }
        
        $allExercisesCompleted = true;

        foreach ($userSession->sessionExercises as $sessionExercise) {
            if ($sessionExercise->status === 'pending') {
                $allExercisesCompleted = false;
            }
        }

        if ($allExercisesCompleted) {
            $userSession->update(['status' => 'completed']);
        }

        $userSession->save();
    }

    public function updateCompletedSessions(Program $program)
    {
        $sessions = UserSession::where('program_id', $program->id)->get();
        $completedSessions = $sessions->filter(function($session) {
            return $session->status == 'completed';
        })->count();
        $program->completed_sessions = $completedSessions;
        $program->remaining_sessions = $program->total_sessions - $completedSessions;
        $program->save();
    }
}