<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Restaurant extends Model
{
    const TABLE = 'restaurants';

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [ 'name', 'tag' ];

    public function pinza(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Pinza::class);
    }

    public function salat(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Salat::class);
    }

    public function sets(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Sets::class);
    }

    public function soup(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Soup::class);
    }

    public function pasta(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Soup::class);
    }

    public function makaron(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Makaron::class);
    }

    public function hot(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Hot::class);
    }

    public function dessert(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Dessert::class);
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * Возвращает количество записей в таблице
     * @return int
     */
    public static function getCount()
    {
        return DB::table(self::TABLE)->count();
    }
}
