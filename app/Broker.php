<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    protected $guarded = [];

    public function agent()
    {
        return $this->hasMany(Agent::class);
    }
}
