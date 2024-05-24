<?php

namespace App\Http\Sections;

use App\Http\Controllers\FeedController;
use App\Restaurant;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Pinza
 *
 * @property \App\Pinza $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Pinza extends Section implements Initializable
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
    protected $title = 'Римская пицца';

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
                            \AdminFormElement::text('title', 'Название')->required()->setHtmlAttribute('maxlength','35'),
                        ], 6)
                        ->addColumn([
                            \AdminFormElement::text('price', 'Цена')->required()->setHtmlAttribute('type', 'number'),
                        ], 3)
                        ->addColumn([
                            \AdminFormElement::text('text', 'Текст')->required(),
                        ], 12)
                        ->addColumn([
                            \AdminFormElement::multiselect('restaurant', 'Ресторан', Restaurant::class)->setDisplay('name'),
                        ], 12)
                        ->addColumn([
                            \AdminFormElement::image('image1', "Изображение в случае, если товар не первый при выводе. Желательные размеры 300*230px. Формат PNG  с прозрачным фоном)")->required(),
                        ], 3)
                        ->addColumn([
                            \AdminFormElement::image('image2', 'Изображение в случае, если товар выводится первым. Желательные размеры 600*260px. Формат PNG  с прозрачным фоном'),
                        ], 3)
                        ->addColumn([
                            \AdminFormElement::image('modal_image', 'Изображение, которое будет в модальном окне при клике на товар. В случае отстутсвия - покажем первое'),
                        ], 3)
                        ->addColumn([
                            \AdminFormElement::image('mobile_image', 'Изображение в мобильном виде'),
                        ], 3)
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
