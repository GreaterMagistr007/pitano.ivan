<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Slider
 *
 * @property \App\Slider $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Slider extends Section implements Initializable
{
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-picture-o');
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
    protected $title = 'Слайдер';

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
        $form = \AdminForm::panel()
            ->addBody([
                    \AdminFormElement::columns()
                        ->addColumn([
                            \AdminFormElement::text('title', 'Текст на слайдере строка 1')->setHtmlAttribute('maxlength','30'),
                        ], 7)
                        ->addColumn([
                            \AdminFormElement::text('text_str_2', 'Текст на слайдере строка 2 (если требуцется перенос)')->setHtmlAttribute('maxlength','30'),
                        ], 7)
                        ->addColumn([
                            \AdminFormElement::text('text_str_3', 'Текст на слайдере строка 2 (если требуцется перенос)')->setHtmlAttribute('maxlength','30'),
                        ], 7)
                        ->addColumn([
                            \AdminFormElement::image('image', 'Изображение (рекомендуемый размер: 1600*630px)')->required(),
                        ], 7)
                        ->addColumn([
                            \AdminFormElement::image('mobile_image', 'Изображение для мобильного вида ')->required(),
                        ], 7)
                ]
            );


        /*  $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('image')->nullable();
         */

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
