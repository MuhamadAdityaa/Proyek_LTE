<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\storeRegisterController as RegisterRequest;
use App\Models\{
    Profile,
    User,
};

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $profile = new Profile();
        $profile->umur = $request->age;
        $profile->bio = $request->bio;
        $profile->alamat = $request->alamat;
        $profile->save();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2, 
            'profile_id' => $profile->id,
        ]);

        return redirect()->route('login.login')->with('success', 'Registration successful! Please log in.');
    }
}
