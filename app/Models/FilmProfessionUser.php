<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


/**
 * App\Models\FilmProfessionUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $film_profession_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|FilmProfessionUser newModelQuery()
 * @method static Builder|FilmProfessionUser newQuery()
 * @method static Builder|FilmProfessionUser query()
 * @method static Builder|FilmProfessionUser whereCreatedAt($value)
 * @method static Builder|FilmProfessionUser whereFilmProfessionId($value)
 * @method static Builder|FilmProfessionUser whereId($value)
 * @method static Builder|FilmProfessionUser whereUpdatedAt($value)
 * @method static Builder|FilmProfessionUser whereUserId($value)
 * @mixin \Eloquent
 */
class FilmProfessionUser extends Model
{
    protected $table = 'film_profession_users';
    protected $fillable = [
        'user_id',
        'film_profession_id'
    ];
}
