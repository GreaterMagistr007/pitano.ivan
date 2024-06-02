<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    const TABLE = 'carts';

    const MODEL_ID = [
        'Pinza' => 'pinzas',
        'Salat' => 'salats',
        'Soup' => 'soups',
        'Sets' => 'sets',
        'Pasta' => 'pastas',
        'Makaron' => 'makarons',
        'Hot' => 'hots',
        'Dessert' => 'desserts',
    ];

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

    /**
     * Возвращает название модели по id продукта
     * @param $productId
     * @return string|null
     */
    public static function getModelByProductId($productId = '')
    {
        if (!is_string($productId) || !strlen($productId)) {
            return null;
        }

        try {
            // костылизируем неправильно названные ID товаров
            $productId = substr(substr($productId, 0, strpos($productId, "_")), 0, -1);
        }catch (\Exception $e) {
            return null;
        }

//        dump($productId);

        foreach (self::MODEL_ID as $model => $id) {
//            dump('$model:' . $model);
//            dump('$id:' . $id);
//            dump(strripos($id, $productId) !== false);
            if (strripos($id, $productId) !== false) {
                return $model;
            }
        }

        return null;
    }
}
