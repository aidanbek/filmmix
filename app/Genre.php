<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string)
 */
class Genre extends Model
{
    protected $table = 'genres';
    protected $fillable = ['title'];

    public function films()
    {
        return $this->belongsToMany(Film::class, FilmGenre::class);
    }
}
