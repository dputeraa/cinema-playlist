<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with(['genre'])
            ->latest()
            ->get();
        return view('movies.index')->with(['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $movies = Movie::all();
        $genres = Genre::all();
        // return view('movie.create', compact('movies', 'genres'));
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_date' => 'required',
            'duration_minutes' => 'required',
            'genre_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $title = $request->input('title');
        // $description = $request->input('description');
        // $release_date = $request->input('release_date');
        // $duration_minutes = $request->input('duration_minutes');
        // $genre_id = $request->input('genre_id');

        // $image = $request->file('image');
        // $image->storeAs('public/images/poster', $image->hashName());

        // // jika menggunakan created tidak perlu memasukan created dan updated at dan harus menambahkan variable baru pada method post $fillable
        // Movie::create([
        //     'title' => $title,
        //     'description' => $description,
        //     'release_date' => $release_date,
        //     'duration_minutes' => $duration_minutes,
        //     'genre_id' => $genre_id,
        //     'image' => $image,
        // ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/poster';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Movie::create($input);
        Session::flash('success_add', 'Data berhasil ditambahkan.');
        return redirect('movies');
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
    public function edit(string $id_movie)
    {
        $movie = Movie::where('id_movie', $id_movie) // ->where('id', '=', $id) tanpa menuliskan "=" larave  enganggapnya menggunakan operator sama dengan "="
            ->first();
        $genre = Genre::all();

        return view('movies.edit', compact('movie', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_movie)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_date' => 'required',
            'duration_minutes' => 'required',
            'genre_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $release_date = $request->input('release_date');
        $duration_minutes = $request->input('duration_minutes');
        $genre_id = $request->input('genre_id');

        // $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/poster';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Movie::where('id_movie', $id_movie)
            ->update([
                'title' => $title,
                'description' => $description,
                'release_date' => $release_date,
                'duration_minutes' => $duration_minutes,
                'genre_id' => $genre_id,
            ]); // sama seperti update ... where id = $id
        // Movie::create($input);

        Session::flash('success_update', 'Data berhasil diubah.');

        return redirect("movies");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_movie)
    {
        Movie::where('id_movie', $id_movie)->delete();
        Session::flash('success_destroy', 'Data berhasil dihapus.');

        return redirect("movies");
    }
}
