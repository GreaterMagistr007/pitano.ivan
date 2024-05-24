<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use KodiComponents\Support\Upload;

class Sets extends Model
{
    use Upload;
    protected $casts = [
        'images' => 'array',
    ];

    public function restaurant(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
