<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FilmDirector
 *
 * @property int $id
 * @property int $film_id
 * @property int $director_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FilmDirector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmDirector newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmDirector query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmDirector whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmDirector whereDirectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmDirector whereFilmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmDirector whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmDirector whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FilmDirector extends Model
{
    protected $table = 'film_directors';
    protected $fillable = ['film_d', 'director_id'];
}
