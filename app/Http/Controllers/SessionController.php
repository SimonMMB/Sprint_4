<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSession;
use App\Services\UserSessionService;

class SessionController extends Controller
{
    protected UserSessionService $userSessionService;

    public function __construct(UserSessionService $userSessionService)
    {
        $this->userSessionService = $userSessionService;
    }

    public function show(UserSession $session)
    {
        return view('session.show', compact('session'));
    }

    public function update(int $userSessionId, int $index)
    {
        $this->userSessionService->completeExercisesAndSession($userSessionId, $index);

        return redirect()->route('session.show', $userSessionId);
    }

    

}
