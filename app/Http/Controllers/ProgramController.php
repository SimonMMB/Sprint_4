<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\UserSession;
use App\Services\UserSessionService;

class ProgramController extends Controller
{
    protected UserSessionService $userSessionService;

    public function __construct(UserSessionService $userSessionService)
    {
        $this->userSessionService = $userSessionService;
    }
    
    public function show(Program $program)
    {
        $this->userSessionService->updateCompletedSessions($program);
        $sessions = UserSession::where('program_id', $program->id)->paginate(10);;

        return view('program.show', compact('program', 'sessions'));
    }

}
