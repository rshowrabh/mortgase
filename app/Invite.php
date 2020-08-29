<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function client()
    {
        return $this->hasOne(User::class, 'id', 'token');
    }
}
