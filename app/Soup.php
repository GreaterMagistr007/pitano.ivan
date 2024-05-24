<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soup extends Model
{
    //

    public function restaurant(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
