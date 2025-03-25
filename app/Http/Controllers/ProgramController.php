<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\UserSession;

class ProgramController extends Controller
{
    
    public function show(Program $program)
    {
        $sessions = UserSession::with(['trainingSessions.exercise'])->where('program_id', $program->id)->get();
        $completedSessions = $sessions->filter(function($session) {
            return $session->status == 'completed';
        })->count();
        $program->completed_sessions = $completedSessions;
        $program->remaining_sessions = $program->total_sessions - $completedSessions;
        $program->save();

        return view('program.show', compact('program', 'sessions'));
    }

}
