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

    public function groups() {
        return $this->hasMany('App\User');
    }
}
