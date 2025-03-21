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
}
