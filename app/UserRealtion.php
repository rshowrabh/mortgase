<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRealtion extends Model
{
    protected $guarded = [];

    public function user()
    {
        return  $this->belongsTo('App\User', 'client_id', 'id');
    }
}
