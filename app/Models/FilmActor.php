<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FilmActor
 *
 * @property int $id
 * @property int $film_id
 * @property int $actor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor whereActorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor whereFilmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FilmActor extends Model
{
    protected $table = 'film_actors';
    protected $fillable = ['film_d', 'actor_id'];
}
