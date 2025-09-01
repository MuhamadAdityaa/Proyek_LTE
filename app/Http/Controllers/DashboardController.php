<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function user(){

        if(Auth::check()){
            return view('homeUser');
        }

        return redirect()->route('login.login')
        ->withErrors([
            'notif' => 'You must be logged in to access the dashboard.',
        ])->onlyInput('email');
    }   

    public function admin() {
        
        if(Auth::check()){
            return view('homeAdmin');
        }

        return redirect()->route('login.login')
        ->withErrors([
            'notif' => 'You must be logged in to access the dashboard.',
        ])->onlyInput('email');
    }
}
