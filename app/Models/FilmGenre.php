<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\FilmGenre
 *
 * @property int $id
 * @property int $film_id
 * @property int $genre_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|FilmGenre newModelQuery()
 * @method static Builder|FilmGenre newQuery()
 * @method static Builder|FilmGenre query()
 * @method static Builder|FilmGenre whereCreatedAt($value)
 * @method static Builder|FilmGenre whereFilmId($value)
 * @method static Builder|FilmGenre whereGenreId($value)
 * @method static Builder|FilmGenre whereId($value)
 * @method static Builder|FilmGenre whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FilmGenre extends Model
{
    protected $table = 'film_genres';
    protected $fillable = [
        'film_d',
        'genre_id'
    ];
}
