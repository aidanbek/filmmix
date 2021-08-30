<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmActor extends Model
{
    protected $table = 'film_actors';
    protected $fillable = ['film_d', 'actor_id'];
}
