<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        try {
            $credential = $request->only('username', 'password');
            if (Auth::attempt($credential)) {
                return redirect()->intended('home');
            }
            return back()->withErrors([
                'message' => 'Username or password invalid',
            ]);
        } catch (\Throwable $th) {
            return $this->error();
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect('/');
        } catch (\Throwable $th) {
            return $this->error();
        }
    }
}
