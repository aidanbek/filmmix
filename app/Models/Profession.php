<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Profession
 *
 * @property int $id
 * @property string $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
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

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, UserProfession::class)
            ->orderBy('users.title');
    }
}
