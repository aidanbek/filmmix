<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Director extends User
{
    protected $attributes = ['is_director' => true];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('directors', function (Builder $builder) {
            $builder->directors();
        });
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, FilmDirector::class);
    }
}
