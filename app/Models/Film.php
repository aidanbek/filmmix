<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Film
 *
 * @property int $id
 * @property string $title
 * @property int $prod_year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Actor[] $actors
 * @property-read int|null $actors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Director[] $directors
 * @property-read int|null $directors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Genre[] $genres
 * @property-read int|null $genres_count
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
    protected $fillable = ['title', 'prod_year'];

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('title');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, FilmActor::class);
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class, FilmDirector::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, FilmGenre::class);
    }
}
