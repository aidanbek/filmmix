<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\FilmCountry
 *
 * @property int $id
 * @property int $film_id
 * @property int $country_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|FilmCountry newModelQuery()
 * @method static Builder|FilmCountry newQuery()
 * @method static Builder|FilmCountry query()
 * @method static Builder|FilmCountry whereCountryId($value)
 * @method static Builder|FilmCountry whereCreatedAt($value)
 * @method static Builder|FilmCountry whereFilmId($value)
 * @method static Builder|FilmCountry whereId($value)
 * @method static Builder|FilmCountry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FilmCountry extends Model
{
    protected $table = 'film_countries';
    protected $fillable = [
        'film_id',
        'country_id'
    ];
}
