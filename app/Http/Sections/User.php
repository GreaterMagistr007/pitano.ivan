<?php

namespace App\Http\Sections;

use Illuminate\Support\Facades\App;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use Hash;
//use App\User;

/**
 * Class User
 *
 * @property \App\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class User extends Section implements Initializable
{
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-users');
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
    protected $title = 'Пользователи';

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
            \AdminColumn::link('name', 'Имя'),
            \AdminColumn::link('email', 'email'),
        ]);
//        dd($display);
        $this->removeMainUser();
        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
//        $this->setPassword();
        $form = \AdminForm::panel()
            ->addBody([
                \AdminFormElement::columns()
                    ->addColumn([
                        \AdminFormElement::text('name', 'Имя')->required(),
                    ], 6)
                    ->addColumn([
                        \AdminFormElement::text('email', 'email')->required(),
                    ], 6)
                    ->addColumn([
                        \AdminFormElement::password('password', 'password')->required()->setHtmlAttribute('value', '')->setDefaultValue('')->hashWithBcrypt(),
                    ], 6)
                    ->addColumn([
                        \AdminFormElement::select('is_operator', 'Права',['Оператор'=>'Оператор',''=>'Администратор'])->setDefaultValue('Оператор'),
                    ], 6)
                ]
            );
//        $this->setPassword();
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

    function removeMainUser(){
        $script = '';
        $script.='
        document.querySelectorAll("a").forEach(function(elem){
            var href = elem.href.split("/");
            if(href[5]){
                if(href[5]==1)
                    elem.parentNode.parentNode.remove();
            }
        });
        ';
        echo('<script>window.addEventListener("load",function(){'.$script.'});</script>');
    }

//    function setPassword(){
//
//        if(isset($_POST["password"])){
//            $_POST["password"] =Hash::make($_POST["password"]);
//            \App\User::where('email',$_POST["email"])->update(['password'=>$_POST["password"]]);
////            dd($_POST);
//        }
//    }
}
