<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $title
 * @property string|null $birth_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Country[] $countries
 * @property-read int|null $countries_count
 * @property-read Collection|Profession[] $professions
 * @property-read int|null $professions_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User ordered()
 * @method static Builder|User query()
 * @method static Builder|User whereBirthDate($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereTitle($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'birth_date'
    ];

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('title');
    }

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(
            Country::class,
            UserCountry::class,
            'user_id',
        'country_id',
            'id',
            'id'
        )->ordered();
    }

    public function professions(): BelongsToMany
    {
        return $this->belongsToMany(
            Profession::class,
            UserProfession::class,
            'user_id',
            'profession_id',
            'id',
            'id'
        )->ordered();
    }
}
