<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::with(['cinema', 'movie'])
            ->latest()
            ->get();

        return view('playlist.index')->with(['playlists' => $playlists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $playlists = Playlist::all();
        $cinemas = Cinema::all();
        $movies = Movie::all();
        return view('playlist.create', compact('playlists', 'cinemas', 'movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cinema_id' => 'required',
            'movie_id' => 'required',
        ]);

        $cinema_id = $request->input('cinema_id');
        $movie_id = $request->input('movie_id');

        // jika menggunakan created tidak perlu memasukan created dan updated at dan harus menambahkan variable baru pada method post $fillable
        Playlist::create([
            'cinema_id' => $cinema_id,
            'movie_id' => $movie_id,
        ]);
        Session::flash('success_add', 'Data berhasil ditambahkan.');
        return redirect('playlist');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_playlist)
    {
        $playlist = Playlist::where('id_playlist', $id_playlist) // ->where('id', '=', $id) tanpa menuliskan "=" larave  enganggapnya menggunakan operator sama dengan "="
            ->first();
        $cinema = Cinema::all();
        $movie = Movie::all();

        return view('playlist.show', compact('playlist', 'cinema', 'movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_playlist)
    {
        $playlist = Playlist::where('id_playlist', $id_playlist) // ->where('id', '=', $id) tanpa menuliskan "=" larave  enganggapnya menggunakan operator sama dengan "="
            ->first();
        $cinema = Cinema::all();
        $movie = Movie::all();

        return view('playlist.edit', compact('playlist', 'cinema', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_playlist)
    {
        $request->validate([
            'cinema_id' => 'required',
            'movie_id' => 'required',
        ]);

        $cinema_id = $request->input('cinema_id');
        $movie_id = $request->input('movie_id');

        Playlist::where('id_playlist', $id_playlist)
            ->update([
                'cinema_id' => $cinema_id,
                'movie_id' => $movie_id,
            ]); // sama seperti update ... where id = $id
        Session::flash('success_update', 'Data berhasil diubah.');

        return redirect("playlist");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_playlist)
    {
        Playlist::where('id_playlist', $id_playlist)->delete();
        Session::flash('success_destroy', 'Data berhasil dihapus.');

        return redirect("playlist");
    }
}
