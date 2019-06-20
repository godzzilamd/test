<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    //

    protected $fillable = [
        'name', 'rights',
    ];

    protected $table = 'groups';

    // public function groups() {
    //     return $this->hasMany('App\User');
    // }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_groups', 'user_id', 'group_id');
        //return $this->belongsToMany(User::class, 'user_groups');
    }
}
