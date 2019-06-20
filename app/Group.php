<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'rights',
    ];

    // public function groups() {
    //     return $this->hasMany('App\User');
    // }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_groups', 'user_id', 'group_id');
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'groups_permissions', 'group_id', 'permission_id');
    }
}
