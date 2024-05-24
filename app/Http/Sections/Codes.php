<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Codes
 *
 * @property \App\Codes $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Codes extends Section implements Initializable
{
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-code');
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
    protected $title = 'Коды';

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
            \AdminColumn::link('code', 'Код')->setWidth('300px'),
            \AdminColumn::link('skidka', 'Скидка')->setWidth('300px'),
            \AdminColumn::link('usedCount', 'Количество использований'),
        ]);
        $display->setApply(function ($query) {
            $query->orderBy('usedCount', 'DESC');
        });
        $this->myScriptonDisplay();
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
                        \AdminFormElement::text('code', 'Код')->required()->setHtmlAttribute('min', '4')->setHtmlAttribute('max', '14')->addValidationRule('min:4')->addValidationRule('max:14'),
                    ], 6)
                    ->addColumn([
                        \AdminFormElement::text('skidka', 'Скидка (%)')->required()->setHtmlAttribute('type', 'number')->setHtmlAttribute('value', '10'),
                    ], 2)
                ]
            );
        $this->myScriptOnEdit();
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

    function myScriptonDisplay(){
        $text = "$('.panel-heading .btn').text('Сгенерировать')";
        echo('<script>window.onload = function(){'.$text.'}</script>');
    }

    function myScriptOnEdit(){
        $url = $_SERVER;

        $text=substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
        if(isset(explode('/',$url['REDIRECT_URL'])['3']) && explode('/',$url['REDIRECT_URL'])['3']=='create'){
            echo('<script>window.onload = function(){$("#code").val("'.$text.'")}</script>');
        }

    }
}
