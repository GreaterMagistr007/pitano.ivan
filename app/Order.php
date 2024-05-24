<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'phone', 'adress', 'comment', 'payment', 'sostav', 'summ', 'status','real_created'
    ];

    public function restaurant(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
