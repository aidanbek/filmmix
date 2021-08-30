<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    protected $primaryKey = 'id';
    protected $fillable = ['title'];

    public function scopeOrdered($query)
    {
        return $query->orderBy('title');
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, FilmGenre::class);
    }
}
