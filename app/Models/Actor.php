<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Actor
 *
 * @property int $id
 * @property string $title
 * @property bool $is_actor
 * @property bool $is_director
 * @property string|null $birth_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Film[] $films
 * @property-read int|null $films_count
 * @method static Builder|User actors()
 * @method static Builder|User directors()
 * @method static Builder|Actor newModelQuery()
 * @method static Builder|Actor newQuery()
 * @method static Builder|User ordered()
 * @method static Builder|Actor query()
 * @method static Builder|Actor whereBirthDate($value)
 * @method static Builder|Actor whereCreatedAt($value)
 * @method static Builder|Actor whereId($value)
 * @method static Builder|Actor whereIsActor($value)
 * @method static Builder|Actor whereIsDirector($value)
 * @method static Builder|Actor whereTitle($value)
 * @method static Builder|Actor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Actor extends User
{
    protected $attributes = ['is_actor' => true];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('actors', function (Builder $builder) {
            $builder->actors();
        });
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, FilmActor::class);
    }
}
