<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    //

    protected $table = 'groups';

    public $primaryKey = 'group_id';

    public function groups() {
        return $this->hasMany('App\User');
    }
}
