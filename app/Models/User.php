<?php

namespace App\Models;

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

    public function scopeOrdered($query)
    {
        return $query->orderBy('title');
    }

    public static function scopeActors($query)
    {
        return $query->where('is_actor', true);
    }

    public static function scopeDirectors($query)
    {
        return $query->where('is_director', true);
    }
}
