<?php

namespace App\Http\Sections;

use App\Restaurant;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

use App\MainSettings;

/**
 * Class Order
 *
 * @property \App\Order $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Order extends Section implements Initializable
{
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-tachometer');
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
    protected $title = 'Заказы';

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

        $display->setFilters(
            \AdminDisplayFilter::related('status')->setModel(Order::class),
            \AdminDisplayFilter::field('Order.status')
        );

        $display->setColumns([
            \AdminColumn::link('id', 'id')->setWidth('300px'),
            \AdminColumn::link('name', 'Имя')->setWidth('300px'),
            \AdminColumn::link('phone', 'Номер телефона')->setWidth('300px'),
            \AdminColumn::link('summ', 'Сумма')->setWidth('300px'),
            \AdminColumn::link('status', 'Статус')->setWidth('300px')->append(\AdminColumn::filter('status')),
            \AdminColumn::link('bank_response', 'Оплата')->setWidth('300px')->append(\AdminColumn::filter('bank_response')),
        ]);
        $display->setApply(function ($query) {
            $query->orderBy('id', 'DESC');
        });
        $this->myScript();
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
                            \AdminFormElement::html('
<table>
    <tbody>
        <tr>
            <td>Заказ получен:</td>
            <td style="padding-left: 10px;"><span id="created_at1"></span></td>
        </tr>
        <tr>
            <td>Последнее изменение записи:</td>
            <td style="padding-left: 10px;"><span id="updated_at1"></span></td>
        </tr>
        <tr>
            <td></td>
            <td><span id="itog" style="padding-top: 10px;padding-left: 10px;font-weight: bold;"></span></td>
        </tr>
    </tbody>
</table>
    ')
                        ],12)
                        ->addColumn([
                            \AdminFormElement::text('name', 'Имя')->required(),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::text('phone', 'Номер телефона')->required(),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::text('adress', 'Адрес'),
                        ], 4)
                        ->addColumn([
                            \AdminFormElement::text('payment', 'Способ оплаты')->required(),
                        ], 6)
                        ->addColumn([
                            \AdminFormElement::text('summ', 'Сумма')->required()->setReadOnly(true),
                        ], 6)
                        ->addColumn([
                            \AdminFormElement::select('restaurant', 'Ресторан', Restaurant::class)->setDisplay('name'),
                        ], 12)
                        ->addColumn([
                            \AdminFormElement::ckeditor('sostav', 'Состав')->required()->setHtmlAttribute('style', 'height: 800px;')->setReadOnly(true),
                        ], 12)

                        ->addColumn([
                            \AdminFormElement::textarea('comment', 'Комментарий')->setHtmlAttribute('style', 'height: 50px')->setReadOnly(true),
                        ], 12)
//                        ->setHtmlAttribute('style', 'height: 500px;')

                        ->addColumn([
                            \AdminFormElement::select('status', 'Статус',['Передан в доставку'=>'Передан в доставку','Недозвон'=>'Недозвон','Отказ'=>'Отказ'])->required(),
                        ], 6)
                        ->addColumn([
                            \AdminFormElement::select('bank_response', 'Оплата',[''=>'','Оплачено'=>'Оплачено']),
                            \AdminFormElement::text('real_created', '')->setHtmlAttribute('style','display:none;')->setReadOnly(true),
                            \AdminFormElement::text('updated_at', '')->setHtmlAttribute('style','display:none;')->setReadOnly(true),
                        ], 6)
                ]
            );
        $this->insideScript();
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



    function myScript(){
        $text = '<div  class="form-elements pull-right" style="width: 50%;display: inline-flex;position:absolute;">';
        $text.= '<label for="status" class="control-label" style="padding-right: 20px;padding-top: 5px;">Статус</label>';
        $text.= '<select id="statusSelector" style="min-width: 300px;" value="">';
//        $text.= '<option selected disabled hidden style="display: none" value="'.'"></option>';

        $text.= '<option stat="" value="/admin/orders">Все</option>';
        $text.= '<option stat="Не обработан" value="/admin/orders?status=Не%20обработан">Не обработан</option>';
        $text.= '<option stat="Передан в доставку" value="/admin/orders?status=Передан%20в%20доставку">Передан в доставку</option>';
        $text.= '<option stat="Недозвон" value="/admin/orders?status=Недозвон">Недозвон</option>';
        $text.= '<option stat="Отказ" value="/admin/orders?status=Отказ">Отказ</option>';
        $text.= '</select></div>';

        $script1 = 'document.querySelectorAll("table .row-link a").forEach(function(elem){if(elem.innerHTML=="0"){elem.innerHTML="";}});';
        $script2 = '$("#statusSelector").on("change",function(){window.location.href = ($(this).val())});';

        $script3 = 'let reboot=0;';
        $script3.= 'console.log(localStorage.getItem("alarm"));setInterval(function() {;';
        $script3.= '$.ajax({type: "POST", url: "/getNewOrders", headers:{"X-CSRF-TOKEN": $("meta[name=';
        $script3.= "'csrf-token'";
        $script3.= ']").attr("content")}, ';
        $script3.= 'success: function(data){';

        $script3.= '
            console.log(localStorage.getItem("alarm"));

            if (data == "alarm") {
                if (reboot > 2) {
                    reboot = 0;
                    window.location.reload()
                } else {
                    reboot++
                }
                if (localStorage.getItem("alarm") == "1") {
                    alarm()
                } else {
                    localStorage.setItem("alarm", "1");
//                    window.location.reload()
                }
            } else {
                localStorage.setItem("alarm", "0");
                reboot = 0
            }
        ';

        $script3.= '}, ';
        $script3.= 'error: function (data){';

        $script3.= '
            if (reboot > 2) {
                reboot = 0;
                window.location.reload();
            } else {
                reboot++;
            }
        ';

        $audio = MainSettings::get()[0];
//        dd($audio->audio_alert);

        $script3.= '}});';
        $script3.= '}, 5000);';
//        $script3.= 'function alarm() {var audio = new Audio();audio.src = "/js/alarm.mp3";audio.autoplay = true;audio.play();}';
        $script3.= 'function alarm() {var audio = new Audio();audio.src = "/'.$audio->audio_alert.'";audio.autoplay = true;audio.play();}';

        $script4 = 'if(window.location.href.split("?")[1]){';
        $script4.= 'document.querySelector("#statusSelector").querySelector("[stat=';
        $script4.= "'";
        $script4.= '"+decodeURI(window.location.href.split("?")[1].split("=")[1].split("&")[0])+"';
        $script4.= "'";
        $script4.= ']").setAttribute("selected",true);}';
        echo('<script>window.onload = function(){document.querySelector(".panel-heading").innerHTML+=`'.$text.'`;'.$script1.$script2.$script3.$script4.'}</script>');
    }

    function insideScript(){

        $script1='var real_created = document.querySelector("#real_created");if(real_created){document.querySelector("#created_at1").innerHTML=real_created.value;real_created.parentNode.remove();}';
        $script1.='var updated_at = document.querySelector("#updated_at");if(updated_at){document.querySelector("#updated_at1").innerHTML=updated_at.value;updated_at.parentNode.remove();}';

        $script2='
let firstDate = document.querySelector("#created_at1").innerHTML.split(\' \')[1];console.log(firstDate);
let secondDate = document.querySelector("#updated_at1").innerHTML.split(\' \')[1];console.log(secondDate);

let getDate = (string) => new Date(0, 0,0, string.split(":")[0], string.split(":")[1]); //получение даты из строки (подставляются часы и минуты
let different = (getDate(secondDate) - getDate(firstDate));console.log(different);

let hours = Math.floor((different % 86400000) / 3600000);
let minutes = Math.round(((different % 86400000) % 3600000) / 60000);
let result = hours + ":" + minutes;

var text="";
if(parseInt(hours)>0){text+=hours+" час.";}
if(parseInt(minutes)>0){text+=minutes+" мин.";}
console.log(result);
console.log(text);
if(text==""){text="Меньше минуты"}
document.querySelector("#itog").innerHTML = text;
        ';

        echo('<script>window.onload = function(){'.$script1.$script2.'}</script>');
    }
}
