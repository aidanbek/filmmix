<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static orderBy(string $string)
 */
class Actor extends User
{
    protected $attributes = ['is_actor' => true];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('actors', function (Builder $builder) {
            $builder->where('is_actor',  true);
        });
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, FilmActor::class);
    }
}
