<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserProfession
 *
 * @property int $id
 * @property int $user_id
 * @property int $profession_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserProfession newModelQuery()
 * @method static Builder|UserProfession newQuery()
 * @method static Builder|UserProfession query()
 * @method static Builder|UserProfession whereCreatedAt($value)
 * @method static Builder|UserProfession whereId($value)
 * @method static Builder|UserProfession whereProfessionId($value)
 * @method static Builder|UserProfession whereUpdatedAt($value)
 * @method static Builder|UserProfession whereUserId($value)
 * @mixin \Eloquent
 */
class UserProfession extends Model
{
    protected $table = 'user_professions';
    protected $fillable = [
        'user_id',
        'profession_id'
    ];
}
