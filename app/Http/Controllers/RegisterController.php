<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\storeRegisterController as RegisterRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $profile = new Profile();
        $profile->umur = $request->umur;
        $profile->bio = $request->bio;
        $profile->alamat = $request->alamat;
        $profile->save();

        $user = User::create([
            'name' => $request->name,
            'email' => $reqeust->email,
            'password' => Hash::make($request->password),
            'profile_id' => $profile->id,
            'role_id' => 1, 
        ]);
    }
}
