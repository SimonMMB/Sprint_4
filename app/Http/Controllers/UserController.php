<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Program;
use App\Services\UserSessionService;

class UserController extends Controller
{
    protected UserSessionService $userSessionService;

    public function __construct(UserSessionService $userSessionService)
    {
        $this->userSessionService = $userSessionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        auth()->login($user);

        return redirect()->route('users.complete-profile');
    }

    public function completeProfile()
    {
        return view('users.complete-profile');
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->update($validated);
        
        //$this->userSessionService->createUserProgram($user);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        $program = Program::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        $program->delete();
        $user->update(['training_frequency' => null, 'training_duration' => null]);
        return redirect()->route('users.complete-profile');
    }
}