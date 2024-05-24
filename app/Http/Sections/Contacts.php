<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Contacts
 *
 * @property \App\Contacts $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Contacts extends Section implements Initializable
{
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-address-book');
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
    protected $title = 'Контактная информация';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return $this->fireEdit(1);
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
                        \AdminFormElement::text('blockTitle', 'Заголовок блока контактов'),
                    ], 12)
                    ->addColumn([
                        \AdminFormElement::text('text', 'Текст в блоке контактов'),
                    ], 12)
                    ->addColumn([
                        \AdminFormElement::text('instagramm', 'Ссылка на инстаграмм-канал'),
                    ], 12)
                    ->addColumn([
                        \AdminFormElement::text('adress', 'Адрес, который показывается в шапке'),
                    ], 12)
                    ->addColumn([
                        \AdminFormElement::text('phone', 'Номер телефона'),
                    ], 12)
                    ->addColumn([
                        \AdminFormElement::text('orgTitle', 'Название организации'),
                    ], 12)
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
