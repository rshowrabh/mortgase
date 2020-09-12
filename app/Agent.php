<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $guarded = [];

    public function clientId()
    {
        return $this->hasMany('App\UserRealtion', 'agents_table_id', 'id');
    }
}
