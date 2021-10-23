<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Film
 *
 * @property int $id
 * @property string $title
 * @property int $prod_year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Country[] $countries
 * @property-read int|null $countries_count
 * @property-read Collection|Genre[] $genres
 * @property-read int|null $genres_count
 * @property-read Collection|Tagline[] $taglines
 * @property-read int|null $taglines_count
 * @method static Builder|Film newModelQuery()
 * @method static Builder|Film newQuery()
 * @method static Builder|Film ordered()
 * @method static Builder|Film query()
 * @method static Builder|Film whereCreatedAt($value)
 * @method static Builder|Film whereId($value)
 * @method static Builder|Film whereProdYear($value)
 * @method static Builder|Film whereTitle($value)
 * @method static Builder|Film whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Film extends Model
{
    protected $table = 'films';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'prod_year'
    ];

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('title');
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, FilmGenre::class)->ordered();
    }

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, FilmOriginCountry::class)->ordered();
    }

    public function taglines(): BelongsToMany
    {
        return $this->belongsToMany(Tagline::class, FilmTagline::class)->ordered();
    }
}
