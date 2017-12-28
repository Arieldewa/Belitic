<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected  $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
