<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Director
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
 * @method static Builder|Director newModelQuery()
 * @method static Builder|Director newQuery()
 * @method static Builder|User ordered()
 * @method static Builder|Director query()
 * @method static Builder|Director whereBirthDate($value)
 * @method static Builder|Director whereCreatedAt($value)
 * @method static Builder|Director whereId($value)
 * @method static Builder|Director whereIsActor($value)
 * @method static Builder|Director whereIsDirector($value)
 * @method static Builder|Director whereTitle($value)
 * @method static Builder|Director whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Director extends User
{
    protected $attributes = ['is_director' => true];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('directors', function (Builder $builder) {
            $builder->directors();
        });
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, FilmDirector::class);
    }
}
