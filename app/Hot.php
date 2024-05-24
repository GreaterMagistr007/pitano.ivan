<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hot extends Model
{
    public function restaurant(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
