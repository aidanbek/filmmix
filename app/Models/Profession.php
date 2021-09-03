<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Profession
 *
 * @property int $id
 * @property string $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Profession newModelQuery()
 * @method static Builder|Profession newQuery()
 * @method static Builder|Profession ordered()
 * @method static Builder|Profession query()
 * @method static Builder|Profession whereCreatedAt($value)
 * @method static Builder|Profession whereId($value)
 * @method static Builder|Profession whereTitle($value)
 * @method static Builder|Profession whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Profession extends Model
{
    protected $table = 'professions';
    protected $primaryKey = 'id';
    protected $fillable = ['title'];

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('title');
    }
}
