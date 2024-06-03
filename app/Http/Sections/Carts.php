<?php

namespace App\Http\Sections;

use App\Cart;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;

/**
 * Class Carts
 *
 * @property \App\Cart $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Carts extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Корзина';

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fa fa-cart-o');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        return \AdminDisplay::datatablesAsync()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                \AdminColumn::link('id', 'Номер магазина')
            )
            ->setOrder([1, 'ASC'])
            ->paginate(20)
        ;
    }

    function getName($id)
    {
        return 'Корзина ресторана №';
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {

        function row_title($text){
            $text = '<h3 style="text-align: center;font-weight: bold;">'.$text.'</h3>';
            return \AdminFormElement::html($text,null);
        }

        $form = \AdminForm::panel()
            ->addBody([
                    \AdminFormElement::columns()

                        /** Кнопка "Корзина" */
                        ->addColumn([
                            row_title('Кнопка "Корзина"'),
                        ], 8)
                        ->addColumn([
                            row_title('Блок товаров'),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::image('cart_button_inner_image', 'Изображение кнопки "Корзина"')
                                ->setDefaultValue('/img/basket1.svg'),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::text('cart_button_product_count_badge_background_color', 'Цвет заднего фона баджи количества товаров кнопки "Корзина"')
                                ->setDefaultValue('#e32323')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::text('cart_button_product_count_badge_font_color', 'Цвет шрифта баджи количества товаров кнопки "Корзина"')
                                ->setDefaultValue('#fff')
                                ->setHtmlAttribute('type', 'color'),
                        ], 4)


                        /** Блок товаров */
                        ->addColumn([
                            \AdminFormElement::text('product_block_font_color', 'Цвет шрифта блока товаров товаров')
                                ->setDefaultValue('#000')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::text('product_block_quantity_border_color', 'Цвет рамки количества товара')
                                ->setDefaultValue('#f15a29')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::image('product_block_minus_button', 'Кнопка уменьшения количества товара')
                                ->setDefaultValue('/img/minus.svg'),
                            \AdminFormElement::image('product_block_plus_button', 'Кнопка увеличения количества товара')
                                ->setDefaultValue('/img/plus.svg'),
                        ], 4)


                        /** Общие настройки: */
                        ->addColumn([
                            \AdminFormElement::html('<hr>',null),
                            row_title('Общие настройки'),
                        ], 12)
                        ->addColumn([
                            \AdminFormElement::text('block_title_font_color', 'Цвет шрифта заголовков блоков')
                                ->setDefaultValue('#f15a29')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::text('error_font_color', 'Цвет шрифта ошибки')
                                ->setDefaultValue('#934400')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::text('active_button_background_color', 'Цвет заднего фона активной кнопки')
                                ->setDefaultValue('#f15a29')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::number('min_delivery_sum', 'Минимальная сумма доставки')
                                ->setDefaultValue('800'),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::image('active_button_background_image', 'Изображение заднего фона активной кнопки при наведении')
                                ->setDefaultValue('/img/orange-bg.svg'),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::text('active_button_font_color', 'Цвет шрифта активной кнопки')
                                ->setDefaultValue('#fff')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::text('inactive_button_background_color', 'Цвет заднего фона неактивной кнопки')
                                ->setDefaultValue('#fff')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::text('inactive_button_font_color', 'Цвет шрифта неактивной кнопки')
                                ->setDefaultValue('#000')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::number('min_promocode_sum', 'Сумма, от которой начинает применяться промокод')
                                ->setDefaultValue('1500'),
                        ], 4)

                        ->addColumn([
                            \AdminFormElement::html('<hr>',null),
                        ], 12)

                        /** Блок способа доставки / самовывоза */
                        ->addColumn([
                            row_title('Блок способа доставки / самовывоза'),
                        ], 4)
                        /** Блок десерта */
                        ->addColumn([
                            row_title('Блок десерта'),
                        ], 8)
                        ->addColumn([
                            \AdminFormElement::html('<hr>',null),
                        ], 12)
                        ->addColumn([
                            /** Блок способа доставки / самовывоза */
                            \AdminFormElement::text('tab_font_color', 'Цвет шрифта вкладок')
                                ->setDefaultValue('#000')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::text('field_title_font_color', 'Цвет шрифта названий полей')
                                ->setDefaultValue('#000')
                                ->setHtmlAttribute('type', 'color'),
                        ], 4)

                        /** Блок десерта */
                        ->addColumn([
                            \AdminFormElement::image('desert_block_product_price_background_image', 'Изображение заднего фона цены десерта')
                                ->setDefaultValue('/img/price-bg.svg'),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::number('desert_block_product_count', 'Количество отображаемых десертов в блоке десерта')
                                ->setDefaultValue(1),
                            \AdminFormElement::text('desert_block_product_title_font_color', 'Цвет шрифта названия десерта')
                                ->setDefaultValue('#000')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::text('desert_block_product_description_font_color', 'Цвет шрифта описания десерта')
                                ->setDefaultValue('#000')
                                ->setHtmlAttribute('type', 'color'),
                            \AdminFormElement::text('desert_block_product_price_font_color', 'Цвет шрифта цены десерта')
                                ->setDefaultValue('#fff')
                                ->setHtmlAttribute('type', 'color'),
                        ], 4)
                ]
            );
        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate($payload = [])
    {
        $model = $this->getModel();
        $model = new $model([]);
        return $this->onEdit($model->id, $payload);
    }

    public function isCreatable()
    {
        Cart::generateCards();
        return false;
        return parent::isCreatable(); // TODO: Change the autogenerated stub
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return false;
    }
}
