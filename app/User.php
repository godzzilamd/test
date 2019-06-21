<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $fillable = [
        'name', 'group_id', 'ifblock', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function user() {
    //     return $this->belongsTo('App\Groups');//todo laravel models relationship one to many, many to many.
    // }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_groups', 'user_id', 'group_id');
    }

    // public function permission()
    // {
    //     return $this->hasManyThrough('App\Permission', 'App\Group');
    // }
}
