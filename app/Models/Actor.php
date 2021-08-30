<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Actor extends User
{
    protected $attributes = ['is_actor' => true];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('actors', function (Builder $builder) {
            $builder->actors();
        });
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, FilmActor::class);
    }
}
