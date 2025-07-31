<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Validation\ValidationException;
use App\Models\casts;

class AddCast extends Controller
{

    public function addcast()
    {
        return view('content.AddCast');
    }

    public function add(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'umur' => 'required|integer|min:0',
            'bio' => 'required|string|max:255',
        ]);

        casts::create([
            'name' => $request->name,
            'umur' => $request->umur,
            'bio' => $request->bio,
        ]);
        // casts::create($request->all());

        return redirect()->route('casts');
    }



}
