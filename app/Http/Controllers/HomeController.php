<?php

namespace App\Http\Controllers;

use App\Models\casts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function appk()
    {
        return view('layouts.app');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function casts()
    {
        $casts = casts::all();
        return view('content.casts', compact('casts'));
    }
}
