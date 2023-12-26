<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::get();
        $view_data = [
            'genres' => $genres
        ];
        return view('genre.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $name = $request->input('name');

        // jika menggunakan created tidak perlu memasukan created dan updated at dan harus menambahkan variable baru pada method post $fillable
        Genre::create([
            'name' => $name,
        ]);
        Session::flash('success_add', 'Data berhasil ditambahkan.');
        return redirect('genre');
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
    public function edit(string $id_genre)
    {
        $genre = Genre::where('id_genre', $id_genre) // ->where('id', '=', $id) tanpa menuliskan "=" laravel menganggapnya menggunakan operator sama dengan "="
            ->first();
        $view_data = [
            'genre' => $genre
        ];
        return view('genre.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_genre)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $name = $request->input('name');

        Genre::where('id_genre', $id_genre)
            ->update([
                'name' => $name,
            ]); // sama seperti update ... where id = $id
        Session::flash('success_update', 'Data berhasil diubah.');

        return redirect("genre");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_genre)
    {
        Genre::where('id_genre', $id_genre)->delete();
        Session::flash('success_destroy', 'Data berhasil dihapus.');

        return redirect("genre");
    }
}
