<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    protected $table = 'film_genres';
    protected $fillable = ['film_d', 'genre_id'];
}
