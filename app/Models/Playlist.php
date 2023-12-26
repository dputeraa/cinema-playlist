<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cinema;
use App\Models\Movie;


class Playlist extends Model
{
    use HasFactory;
    public $table = "playlist";
    protected $guarded = ['id_playlist'];

    public function cinema()
    {
        return $this->belongsTo(Cinema::class, 'cinema_id', 'id_cinema');
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id_movie');
    }
}
