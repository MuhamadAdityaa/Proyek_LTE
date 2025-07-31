<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\casts;

class EditCast extends Controller
{
    public function nilai(casts $id){

        $name = $id->name;
        $umur = $id->umur;
        $bio = $id->bio;

        
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());


        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'umur' => 'required|integer|min:0',
        //     'bio' => 'required|string|max:255',
        // ]);

        $cast = casts::find($id);

        if($cast) {
            $cast->update([
                'name' => $request->name,
                'umur' => $request->umur,
                'bio' => $request->bio,
            ]);
            return redirect()->route('casts')->with('success', 'Cast updated successfully.');
        } else {
            return response()->json([
                'message' => 'Cast not found.'
            ], 404);
        }


        
    }
}
