<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        if (! Auth::guest()) {
            return redirect('/tasks');
        }
        return view('auth.login');
    }

    public function store(){      
        
        $attributes=request()->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid Credentials'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/tasks');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
