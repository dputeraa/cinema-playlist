<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cinemas = Cinema::get();
        $view_data = [
            'cinemas' => $cinemas
        ];
        return view('cinema.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cinema.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $name = $request->input('name');
        $location = $request->input('location');

        // jika menggunakan created tidak perlu memasukan created dan updated at dan harus menambahkan variable baru pada method post $fillable
        Cinema::create([
            'name' => $name,
            'location' => $location,
        ]);
        Session::flash('success_add', 'Data berhasil ditambahkan.');
        return redirect('cinema');
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
    public function edit(string $id_cinema)
    {
        $cinema = Cinema::where('id_cinema', $id_cinema) // ->where('id', '=', $id) tanpa menuliskan "=" laravel menganggapnya menggunakan operator sama dengan "="
            ->first();
        $view_data = [
            'cinema' => $cinema
        ];
        return view('cinema.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_cinema)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $name = $request->input('name');
        $location = $request->input('location');

        Cinema::where('id_cinema', $id_cinema)
            ->update([
                'name' => $name,
                'location' => $location,
            ]); // sama seperti update ... where id = $id
        Session::flash('success_update', 'Data berhasil diubah.');

        return redirect("cinema");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_cinema)
    {
        Cinema::where('id_cinema', $id_cinema)->delete();
        Session::flash('success_destroy', 'Data berhasil dihapus.');

        return redirect("cinema");
    }
}
