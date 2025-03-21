<?php

namespace App\Services;

use App\Models\Program;
use App\Models\UserSession;
use App\Models\TrainingSession;
use App\Models\Exercise;
use App\Models\User;
use DateTime;

class UserSessionService
{
    public function createUserProgram(User $user)
    {
        $totalWeeks = $user->training_duration * 4;
        $sessionsPerWeek = $user->training_frequency;
        $totalSessions = $sessionsPerWeek * $totalWeeks;

        $program = Program::create([
            'user_id' => $user->id,
            'total_sessions' => $totalSessions,
            'completed_sessions' => 0,
            'remaining_sessions' => $totalSessions
        ]);
       
        $this->createUserSessions($user, $program);
    }

    public function createUserSessions(User $user, Program $program)
    {
        $totalWeeks = $user->training_duration * 4;
        $sessionsPerWeek = $user->training_frequency;
        $startDate = new DateTime($user->start_date);

        for ($week = 0; $week < $totalWeeks; $week++) {

            for ($session = 0; $session < $sessionsPerWeek; $session++) {

                while (in_array($startDate->format('N'), [6, 7])) {
                    $startDate->modify('+1 day');
                }

                $userSession = UserSession::create([
                    'program_id' => $program->id,
                    'user_id' => $user->id,
                    'estimated_date' => $startDate,
                    'status' => 'pending',
                    'comments' => null
                ]);

                $this->assignExercisesToSession($userSession);
                $startDate->modify('+1 day');
            }
        }
    }

    private function assignExercisesToSession($userSession)
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
            TrainingSession::create([
                'user_session_id' => $userSession->id,
                'exercise_id' => $exercise->id
            ]);
        }
    }
}