<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;

class HomeController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();  

        if (!$user) {
            return redirect()->route('login'); 
        }

        $name = $user->name;  
        $program = $user->program; 

        return view('dashboard', [
            'name' => $name,
            'program_id' => $program ? $program->id : null
        ]);
    }

}
