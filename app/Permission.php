<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'groups_permissions', 'group_id', 'permission_id');
    }
}
