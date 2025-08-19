<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function User() {
        return view('dashboard');
    }

    public function Admin() {
        return redirect()->route('dashboard');
    }
}
