<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected  $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);

    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
