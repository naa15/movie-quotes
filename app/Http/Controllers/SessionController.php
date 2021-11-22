<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('admin.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        
        if (Auth::attempt($attributes)) {
            return redirect('/');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be varified.'
        ]);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
