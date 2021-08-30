<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'is_actor',
        'is_director',
        'birth_date'
    ];

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('title');
    }

    public static function scopeActors(Builder $query): Builder
    {
        return $query->where('is_actor', true);
    }

    public static function scopeDirectors(Builder $query): Builder
    {
        return $query->where('is_director', true);
    }
}
