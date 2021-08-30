<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $title
 * @property bool $is_actor
 * @property bool $is_director
 * @property string|null $birth_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|User actors()
 * @method static Builder|User directors()
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User ordered()
 * @method static Builder|User query()
 * @method static Builder|User whereBirthDate($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsActor($value)
 * @method static Builder|User whereIsDirector($value)
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
        'is_actor',
        'is_director',
        'birth_date'
    ];

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('title');
    }

    public static function scopeActors(Builder $query): Builder
    {
        return $query->where('is_actor', true);
    }

    public static function scopeDirectors(Builder $query): Builder
    {
        return $query->where('is_director', true);
    }
}
