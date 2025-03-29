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
    
    public function create()
    {
        return view('program.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'training_frequency' => 'required|integer|between:2,5',
            'training_duration' => 'required|integer|between:2,6',
            'start_date' => 'required|date',
            'estimated_end_date' => 'required|date|after:start_date',
        ]);

        $user = auth()->user();

        $this->userSessionService->createUserProgram($user, $validated['training_frequency'], $validated['training_duration'], $validated['start_date'], $validated['estimated_end_date']);

        return redirect()->route('dashboard');
    }


    public function show(Program $program)
    {
        $this->userSessionService->updateCompletedSessions($program);
        $sessions = UserSession::where('program_id', $program->id)->paginate(10);;

        return view('program.show', compact('program', 'sessions'));
    }

}
