<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Events\NewUser;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() 
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id')->withPivot('user_type');
    }

    public function images()
    {
        return $this->morphToMany('App\Image', 'imageable')->withPivot('option', 'info')->withTimestamps();
    }

    public function detail()
    {
        return $this->hasOne('App\UserDetail');
    }

    public function socialmedias() 
    {
        return $this->hasMany('App\Sosmed', 'user_id');
    }

    public function messengers()
    {
        return $this->hasMany('App\Messenger', 'user_id');
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }
}
