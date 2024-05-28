<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    const TABLE = 'carts';

    /**
     * Возвращает количество записей в таблице
     * @return int
     */
    public static function getCount()
    {
        return DB::table(self::TABLE)->count();
    }

    /**
     * Генерирует нужное количество корзин с дефолтными параметрами
     * @return void
     */
    public static function generateCards()
    {
        $restaurantsCount = Restaurant::getCount();

        while (self::getCount() < $restaurantsCount) {
            $item = new self([]);
            $item->save();
        }
    }
}
