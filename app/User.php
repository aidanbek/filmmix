<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'title',
        'is_actor',
        'is_director',
        'birth_date'
    ];

    public static function scopeActors($query)
    {
        return $query->where('is_actor', true);
    }

    public static function scopeDirectors($query)
    {
        return $query->where('is_director', true);
    }
}
