<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class MainSettings
 *
 * @property \App\MainSettings $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class MainSettings extends Section implements Initializable
{
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-cogs');
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
    protected $title = 'Основные настройки';

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
        $this->after_save();
        // remove if unused
        $form = \AdminForm::panel()
            ->addBody([
                    \AdminFormElement::columns()
                        ->addColumn([
                            \AdminFormElement::text('siteTitle', 'Заголовок сайта')->required(),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::file('audio_alert', 'Сигнал воздушной тревоги')->required(),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::view('admin-templates.show-models-in-site'),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::html('<hr>'),
                        ], 12)

                        ->addColumn([
                            \AdminFormElement::select('deliveryShowSettings', 'Доставлено заказов',['real'=>'Показывать реальное количество','random'=>'Генерировать'])->required(),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::text('footerText', 'Текст в футере')->required(),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::text('mail', 'emeil для обратной связи')->required(),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::ckeditor('oferta', 'Договор оферты')->required(),
                        ], 12)
                        ->addColumn([
                            \AdminFormElement::ckeditor('delivery', 'Доставка')->required()
                        ], 12)
                        ->addColumn([
                            \AdminFormElement::ckeditor('organization', 'Карточка предприятия')->required()
                        ], 12)
                        ->addColumn([
                            \AdminFormElement::ckeditor('agreement', 'Пользовательское соглашение')->required(),
                        ], 12)
                        ->addColumn([
                            \AdminFormElement::textarea('mapSRC', 'Скрипт карты')->required(),
                        ], 12)
                ]
            );
        return $form;

        /*
         * $table->text('siteTitle')->nullable();
            $table->longText('oferta')->nullable();
            $table->longText('delivery')->nullable();
            $table->longText('agreement')->nullable();
            $table->text('footerText')->nullable();
            $table->text('deliveryShowSettings')->nullable();
         */
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

    function after_save(){
        if(isset($_POST) && $_POST && is_array($_POST) && isset($_POST["siteTitle"])){
            $models = \App\MainSettings::$models;
            $result = [];
            foreach($models as $model=>$settings){
                $result[$model]["title"] = $settings["title"];
                $result[$model]["show"] = isset($_POST['model_show_on_site'][$model])?true:false;
            }
//            dd($_POST["model_show_on_site"],$result);
            \App\MainSettings::save__model_show_on_site($result);

//            dd($_POST);
        }
    }
}
