<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Events\SendUserConfirmEmail;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $dispatchesEvents = ['created' => SendUserConfirmEmail::class,];

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

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->id == 1) {
                return true;
            }
        }

        return false;
    }
    public function isAgent()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->id == 2) {
                return true;
            }
        }

        return false;
    }
    public function isClient()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->id == 3) {
                return true;
            }
        }

        return false;
    }
    public function isBroker()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->id == 4) {
                return true;
            }
        }

        return false;
    }

    // public function agent()
    // {
    //     return $this->hasMany(UserRealtion::class, 'agent_id', 'id');
    // }
    public function waveOne()
    {
        return $this->hasOne(WaveOne::class, 'user_id', 'id');
    }
    public function broker()
    {
        return $this->hasOne(Broker::class);
    }

    public function agent()
    {
        return $this->hasOne(Agent::class);
    }
    public function client()
    {
        return $this->hasMany(UserRealtion::class, 'agent_id');
    }
}
