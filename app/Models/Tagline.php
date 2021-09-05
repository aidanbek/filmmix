<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Tagline
 *
 * @property int $id
 * @property string $text
 * @property string $original_text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Film[] $films
 * @property-read int|null $films_count
 * @method static Builder|Tagline newModelQuery()
 * @method static Builder|Tagline newQuery()
 * @method static Builder|Tagline ordered()
 * @method static Builder|Tagline query()
 * @method static Builder|Tagline whereCreatedAt($value)
 * @method static Builder|Tagline whereId($value)
 * @method static Builder|Tagline whereOriginalText($value)
 * @method static Builder|Tagline whereText($value)
 * @method static Builder|Tagline whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tagline extends Model
{
    protected $table = 'taglines';
    protected $fillable = [
        'text',
        'original_text'
    ];

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('text');
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, FilmTagline::class)->ordered();
    }
}
