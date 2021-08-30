<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'films';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'prod_year'];

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('title');
    }

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
