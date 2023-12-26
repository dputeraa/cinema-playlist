<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Playlist;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cinemas = Cinema::get();
        $movies = Movie::get();
        $playlists = Playlist::with(['cinema', 'movie'])
            ->latest()
            ->get();
        $view_data = [
            'cinemas' => $cinemas,
            'movies' => $movies,
            'playlists' => $playlists,
        ];
        return view('index', $view_data);
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
    public function show(string $id)
    {
        //
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
