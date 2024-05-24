<?php

namespace App\Http\Sections;

use App\Http\Controllers\FeedController;
use App\Restaurant;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Salat
 *
 * @property \App\Salat $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Salat extends Section implements Initializable
{
    public function initialize()
    {
        // $this->addToNavigation()->setIcon('fa fa-edit');
    }
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Салаты';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return \AdminDisplay::tree();
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        FeedController::regenerateYMLFeed();
        $form = \AdminForm::panel()
            ->addBody([
                    \AdminFormElement::columns()
                        ->addColumn([
                            \AdminFormElement::text('title', 'Название')->required()->setHtmlAttribute('maxlength','25'),
                            \AdminFormElement::checkbox('show_on_site', 'Отображать на сайте'),
                        ], 7)
                        ->addColumn([
                            \AdminFormElement::text('price', 'Цена')->required()->setHtmlAttribute('type', 'number'),
                        ], 7)
                        ->addColumn([
                            \AdminFormElement::text('text', 'Текст')->required(),
                        ], 7)
                        ->addColumn([
                            \AdminFormElement::multiselect('restaurant', 'Ресторан', Restaurant::class)->setDisplay('name'),
                        ], 7)
                        ->addColumn([
                            \AdminFormElement::image('image', 'Изображение (должно быть квадратным. Желательная ширина и высота по 360px)')->required(),
                        ], 7)
                ]
            );
        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
