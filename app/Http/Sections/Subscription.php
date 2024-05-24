<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Subscription
 *
 * @property \App\Subscription $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Subscription extends Section implements Initializable
{
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-list-alt');
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
    protected $title = 'Подписки';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = \AdminDisplay::table();
        $display->setColumns([
            \AdminColumn::link('id', 'id')->setWidth('300px'),
            \AdminColumn::link('name', 'Имя')->setWidth('300px'),
            \AdminColumn::link('phone', 'Номер телефона')->setWidth('300px'),
        ]);
        $display->setApply(function ($query) {
            $query->orderBy('id', 'DESC');
        });
        return $display;
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
                            \AdminFormElement::text('name', 'Имя')->required(),
                        ], 6)
                        ->addColumn([
                            \AdminFormElement::text('phone', 'Номер телефона')->required(),
                        ], 6),
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
