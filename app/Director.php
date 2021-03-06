<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static orderBy(string $string)
 * @method static create(array $array)
 * @method static where(string $string, $id)
 */
class Director extends User
{
    protected $attributes = ['is_director' => true];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('directors', function (Builder $builder) {
            $builder->where('is_director',  true);
        });
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, FilmDirector::class);
    }
}
