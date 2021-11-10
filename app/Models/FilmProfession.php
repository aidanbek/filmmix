<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;


/**
 * App\Models\FilmProfession
 *
 * @property int $id
 * @property int $film_id
 * @property int $profession_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Profession $profession
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static Builder|FilmProfession newModelQuery()
 * @method static Builder|FilmProfession newQuery()
 * @method static Builder|FilmProfession query()
 * @method static Builder|FilmProfession whereCreatedAt($value)
 * @method static Builder|FilmProfession whereFilmId($value)
 * @method static Builder|FilmProfession whereId($value)
 * @method static Builder|FilmProfession whereProfessionId($value)
 * @method static Builder|FilmProfession whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FilmProfession extends Model
{
    protected $table = 'film_professions';
    protected $fillable = [
        'film_id',
        'profession_id'
    ];

    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            FilmProfessionUser::class,
            'film_profession_id',
            'user_id',
            'id',
            'id'
        )->ordered();
    }
}
