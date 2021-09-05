<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\FilmTagline
 *
 * @property int $id
 * @property int $film_id
 * @property int $tagline_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|FilmTagline newModelQuery()
 * @method static Builder|FilmTagline newQuery()
 * @method static Builder|FilmTagline query()
 * @method static Builder|FilmTagline whereCreatedAt($value)
 * @method static Builder|FilmTagline whereFilmId($value)
 * @method static Builder|FilmTagline whereId($value)
 * @method static Builder|FilmTagline whereTaglineId($value)
 * @method static Builder|FilmTagline whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FilmTagline extends Model
{
    protected $table = 'film_taglines';
    protected $fillable = [
        'film_id',
        'tagline_id'
    ];
}
