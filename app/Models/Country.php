<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Film[] $films
 * @property-read int|null $films_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static Builder|Country newModelQuery()
 * @method static Builder|Country newQuery()
 * @method static Builder|Country ordered()
 * @method static Builder|Country query()
 * @method static Builder|Country whereCode($value)
 * @method static Builder|Country whereCreatedAt($value)
 * @method static Builder|Country whereId($value)
 * @method static Builder|Country whereTitle($value)
 * @method static Builder|Country whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'code'
    ];

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('title');
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, FilmCountry::class)->ordered();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, UserCountry::class)->ordered();
    }
}
