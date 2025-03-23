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
        return view('program.show', compact('program', 'sessions'));
    }

}
