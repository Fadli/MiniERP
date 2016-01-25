<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    protected $table = 'permissions';

    protected $fillable = ['id','name', 'label'];


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}