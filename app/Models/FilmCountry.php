<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\filmCountry
 *
 * @property int $id
 * @property int $film_id
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCountry whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCountry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCountry whereFilmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCountry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FilmCountry extends Model
{
    protected $table = 'film_countries';
    protected $fillable = ['film_id', 'country_id'];
}
