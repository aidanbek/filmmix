<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmDirector extends Model
{
    protected $table = 'film_directors';
    protected $fillable = ['film_d', 'director_id'];
}
