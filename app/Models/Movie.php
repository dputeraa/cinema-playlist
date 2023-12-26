<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;


class Movie extends Model
{
    use HasFactory;
    public $table = "movies";
    protected $guarded = ['id_movie'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id_genre');
    }
}
