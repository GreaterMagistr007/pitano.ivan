<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('default_title')
                ->comment('Дефолное название корзины в админке')
                ->default('Корзина для ресторана');

            /** Кнопка "Корзина" */
            $table->string('cart_button_inner_image')
                ->comment('Изображение кнопки "Корзина"')
                ->default('/img/basket1.svg');
            $table->string('cart_button_product_count_badge_background_color')
                ->comment('Цвет заднего фона баджи количества товаров кнопки "Корзина"')
                ->default('#e32323');
            $table->string('cart_button_product_count_badge_font_color')
                ->comment('Цвет шрифта баджи количества товаров кнопки "Корзина"')
                ->default('#fff');

            /** Общие настройки: */
            $table->string('block_title_font_color')
                ->comment('Цвет шрифта заголовков блоков')
                ->default('#f15a29');
            $table->string('error_font_color')
                ->comment('Цвет шрифта ошибки')
                ->default('#934400');
            $table->string('active_button_background_color')
                ->comment('Цвет заднего фона активной кнопки')
                ->default('#f15a29');
            $table->string('active_button_background_image')
                ->comment('Изображение заднего фона активной кнопки при наведении')
                ->default('/img/orange-bg.svg')
                ->nullable();
            $table->string('active_button_font_color')
                ->comment('Цвет шрифта активной кнопки')
                ->default('#fff');
            $table->string('inactive_button_background_color')
                ->comment('Цвет заднего фона неактивной кнопки')
                ->default('#fff');
            $table->string('inactive_button_font_color')
                ->comment('Цвет шрифта неактивной кнопки')
                ->default('#000');
            $table->integer('min_delivery_sum')
                ->comment('Минимальная сумма доставки')
                ->default(800);
            $table->integer('min_promocode_sum')
                ->comment('Сумма, от которой начинает применяться промокод')
                ->default(1500);

            /** Блок товаров */
            $table->string('product_block_font_color')
                ->comment('Цвет шрифта блока товаров товаров')
                ->default('black');

            /** Блок способа доставки / самовывоза */
            $table->string('tab_font_color')
                ->comment('Цвет шрифта вкладок')
                ->default('#000');
            $table->string('field_title_font_color')
                ->comment('Цвет шрифта названий полей')
                ->default('#000');

            /** Блок десерта */
            $table->integer('desert_block_product_count')
                ->comment('Количество отображаемых десертов в блоке десерта')
                ->default(1)
                ->nullable();
            $table->string('desert_block_product_title_font_color')
                ->comment('Цвет шрифта названия десерта')
                ->default('#000');
            $table->string('desert_block_product_description_font_color')
                ->comment('Цвет шрифта описания десерта')
                ->default('#000');
            $table->string('desert_block_product_price_font_color')
                ->comment('Цвет шрифта цены десерта')
                ->default('#fff');
            $table->string('desert_block_product_price_background_image')
                ->comment('Изображение заднего фона цены десерта')
                ->default('/img/price-bg.svg');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
