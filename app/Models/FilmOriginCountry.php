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
 * @method static Builder|FilmOriginCountry newModelQuery()
 * @method static Builder|FilmOriginCountry newQuery()
 * @method static Builder|FilmOriginCountry query()
 * @method static Builder|FilmOriginCountry whereCountryId($value)
 * @method static Builder|FilmOriginCountry whereCreatedAt($value)
 * @method static Builder|FilmOriginCountry whereFilmId($value)
 * @method static Builder|FilmOriginCountry whereId($value)
 * @method static Builder|FilmOriginCountry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FilmOriginCountry extends Model
{
    protected $table = 'film_origin_countries';
    protected $fillable = [
        'film_id',
        'country_id'
    ];
}
