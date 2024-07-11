<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property UsersTag[] $usersTags
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersTags()
    {
        return $this->hasMany(\App\Models\UsersTags::class, 'id', 'user_id');
    }


}
