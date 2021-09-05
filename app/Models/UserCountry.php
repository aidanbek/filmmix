<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserCountry
 *
 * @property int $id
 * @property int $user_id
 * @property int $country_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserCountry newModelQuery()
 * @method static Builder|UserCountry newQuery()
 * @method static Builder|UserCountry query()
 * @method static Builder|UserCountry whereCountryId($value)
 * @method static Builder|UserCountry whereCreatedAt($value)
 * @method static Builder|UserCountry whereId($value)
 * @method static Builder|UserCountry whereUpdatedAt($value)
 * @method static Builder|UserCountry whereUserId($value)
 * @mixin \Eloquent
 */
class UserCountry extends Model
{
    protected $table = 'user_countries';
    protected $fillable = [
        'user_id',
        'country_id'
    ];
}
