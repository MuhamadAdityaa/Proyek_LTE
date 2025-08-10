<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Film,
    Genre,
    Peran
};
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use Illuminate\Support\Facades\Storage;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        $films = Film::with('genre')->get();
        return view('content.film.Film', compact('films', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function film()
    {
        Film::with('genre')->get();
        $genres = Genre::all();
        return view('content.film.insertFilm', compact('genres'));
    }

    public function showedit($id)
    {
        $film = Film::find($id);
        if (!$film) {
            return redirect()->route('film')->with('error', 'Film not found.');
        }
        Film::with('genre')->get();
        $genres = Genre::all();
        return view('content.film.editFilm', compact('film', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'judul' => 'required|string|max:255',
        //     'ringkasan' => 'required|string|max:255',
        //     'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        //     'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'genre_id' => 'required|exists:genres,id',
        // ]);

        $foto = $request->file('poster');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('storage/posters'), $filename);
        $path = 'posters/' . $filename;


        Film::create([
            'judul' => $request->judul,
            'ringkasan' => $request->ringkasan,
            'tahun' => $request->tahun,
            'poster' => $path, // simpan path poster
            'genre_id' => $request->genre,
        ]);

        return redirect()->route('film');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(request $request, $id)
    {
        $film = Film::find($id);
        $foto = $film->poster;

        if ($film) {
            if ($request->hasfile('poster')) {
                storage::disk('public')->delete($foto);

                $foto = $request->file('poster');
                $filename = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('storage/posters'), $filename);
                $path = 'posters/' . $filename;

                $film->update([
                    'judul' => $request->judul,
                    'ringkasan' => $request->ringkasan,
                    'tahun' => $request->tahun,
                    'poster' => $path,
                    'genre_id' => $request->genre,
                ]);
            } else {

                $film->update([
                    'judul' => $request->judul,
                    'ringkasan' => $request->ringkasan,
                    'tahun' => $request->tahun,
                    'genre_id' => $request->genre,
                ]);
            }
            return redirect()->route('film')->with('success', 'Cast updated successfully.');
        } else {
            return response()->json([
                'message' => 'Cast not found.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        $foto = $film->poster;


        // Check if the cast exists before attempting to delete
        if ($film) {
            $film->delete();
            if ($foto) {
                storage::disk('public')->delete($foto);
            }
            return redirect()->route('film')->with('success', 'Cast deleted successfully.');
        } else {
            return response()->json([
                'message' => 'Cast not found.'
            ], 404);
        }
    }

    public function showDetail($id){
        Film::with('perans')->get();
        $film = Film::find($id);

        if (!$film) {
            return redirect()->route('film')->with('error', 'Film not found.');
        } else {
            return view('content.film.detailFilm', compact('film'));
        }
    }
}
