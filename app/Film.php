<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static orderBy(string $string)
 */
class Film extends Model
{
    protected $table = 'films';
    protected $fillable = ['title', 'prod_year'];

    public function actors()
    {
        return $this->belongsToMany(Actor::class, FilmActor::class);
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class, FilmDirector::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, FilmGenre::class);
    }
}
