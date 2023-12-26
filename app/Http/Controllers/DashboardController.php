<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Playlist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $playlists = Playlist::with(['cinema', 'movie'])
        //     ->latest()
        //     ->get();

        // return view('playlist.index')->with(['playlists' => $playlists]);
        $genres = Genre::get();
        $cinemas = Cinema::get();
        $movies = Movie::get();
        $playlists = Playlist::with(['cinema', 'movie'])
            ->latest()
            ->get();
        $view_data = [
            'genres' => $genres,
            'cinemas' => $cinemas,
            'movies' => $movies,
            'playlists' => $playlists,
        ];
        return view('dashboard.dashboard', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        return view('dashboard.show', compact('playlist', 'cinema', 'movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
