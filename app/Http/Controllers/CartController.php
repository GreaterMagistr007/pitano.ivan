<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Pasta;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Возвращает настройки текущей корзины
     * @return mixed
     */
    public static function getSettings()
    {
        $activeRestId = Restaurant::getActiveId();
        $activeCartSettings = Cart::find($activeRestId);

        return $activeCartSettings;
    }

    /**
     * Возвращает список товаров в корзине пользователя
     * @return array
     */
    private function getProducts()
    {
        $result = Session::get('cart');
        if ($result) {
            return json_decode($result);
        }
        return [];
    }

    /**
     * Возвращает текущее состояние корзины пользователя
     * @return array
     */
    public function index()
    {
        $result = [
            'products' => $this->getProducts(),
            'settings' => self::getSettings()
        ];

        return $result;
    }



    public function getProductData($id)
    {
        $error = ['error' => 'Product with id "' . $id . '" not found'];
        $productModel = Cart::getModelByProductId($id);

        if (!$productModel) {
            return $error;
        }

        $productModel = '\App\\' . $productModel;

        $product = $productModel::where('product_id', $id)->get();

        if (!$product) {
            return $error;
        }

        return $product;
    }
}
