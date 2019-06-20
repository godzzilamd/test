<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_group extends Model
{
    protected $fillable = [
        'user_id', 'group_id',
    ];

    protected $table = 'user_groups';
}
