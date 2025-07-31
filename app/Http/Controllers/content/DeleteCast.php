<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\casts;

class DeleteCast extends Controller
{
    public function delete($id)
    {
        // dd($id);
        // $request->validate([
        //     'id' => 'required|integer|exists:casts,id',
        // ]);

        $cast = casts::find($id);

        // Check if the cast exists before attempting to delete
        if ($cast) {
            $cast->delete();
            return redirect()->route('casts')->with('success', 'Cast deleted successfully.');
        } else {
            return response()->json([
                'message' => 'Cast not found.'
            ], 404);
        }
    }
}
