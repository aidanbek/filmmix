<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FilmGenre
 *
 * @property int $id
 * @property int $film_id
 * @property int $genre_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre whereFilmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre whereGenreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FilmGenre extends Model
{
    protected $table = 'film_genres';
    protected $fillable = ['film_d', 'genre_id'];
}
