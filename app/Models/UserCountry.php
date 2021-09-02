<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserCountry
 *
 * @property int $id
 * @property int $user_id
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCountry whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCountry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCountry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCountry whereUserId($value)
 * @mixin \Eloquent
 */
class UserCountry extends Model
{
    protected $table = 'user_countries';
    protected $fillable = ['user_id', 'country_id'];
}
