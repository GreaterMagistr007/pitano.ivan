<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    const TABLE = 'carts';

    public static function getCount()
    {
        return DB::table(self::TABLE)->count();
    }
}
