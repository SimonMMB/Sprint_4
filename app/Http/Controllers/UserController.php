<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'training_frequency' => 'required|integer|between:2,5',
            'training_duration' => 'required|integer|between:2,6',
            'start_date' => 'required|date',
            'estimated_end_date' => 'required|date|after:start_date',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'training_frequency' => $validated['training_frequency'],
            'training_duration' => $validated['training_duration'],
            'start_date' => $validated['start_date'],
            'estimated_end_date' => $validated['estimated_end_date'],
        ]);

        $this->userSessionService->createUserProgram($user);

        return redirect()->route('users.show', $user->id)->with('success', 'Usuario registrado y sesiones generadas');
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
        //
    }
}
