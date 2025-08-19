<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function authenticate(storeAuthRequest $request) {

        if (Auth::attempt(['email' => $request->email, 'password'=> $request->password])) {
            $request->session()->regenerate();
            if (auth()->user()->role_id == 1) {
                return redirect()->route('dashboard.admin');
            } else {
                return redirect()->route('dashboard.user');
            }
        }

        return back()->withErrors([
            'notif' => 'Credential do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.login')->with('success', 'You have been logged out successfully.');
    }
}
