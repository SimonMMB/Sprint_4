<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
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
            'objective' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'training_frequency' => 'required|integer|min:1|max:7',
            'cycle_duration' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'estimated_end_date' => 'required|date|after:start_date',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'objective' => $validated['objective'],
            'experience' => $validated['experience'],
            'training_frequency' => $validated['training_frequency'],
            'cycle_duration' => $validated['cycle_duration'],
            'start_date' => $validated['start_date'],
            'estimated_end_date' => $validated['estimated_end_date'],
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
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
