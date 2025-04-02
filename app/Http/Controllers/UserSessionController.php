<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSession;
use App\Services\UserSessionService;

class UserSessionController extends Controller
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

    public function update(Request $request, int $userSessionId, int $index)
    {
        $this->userSessionService->completeExercisesAndSession($request, $userSessionId, $index);

        return redirect()->route('session.show', $userSessionId);
    }  
}

?>