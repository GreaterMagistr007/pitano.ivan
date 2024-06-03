<?php

namespace App\Http\Controllers;

use App\Hot;
use App\Makaron;
use App\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Slider;
use App\Description;
use App\Dessert;
use App\Salat;
use App\Soup;
use App\Pinza;
use App\Contacts;
use App\MainSettings;
use App\Subscription;
use App\Order;
use App\Codes;
use App\Sets;
use App\Pasta;
use Auth;
use Illuminate\Support\Facades\Session;

class MainSettingsController extends Controller
{
    function index($view='index',Request $request) {
        $warehouseChosen = Session::get('warehouse') ;

        $modules=[];
        $modules = self::get_products_modules($modules, $warehouseChosen);
        $modules['Restaurants'] = Restaurant::all();
        $modules['Slider'] = Slider::get();
        $modules['Description'] = Description::get()[0];

        $modules['Contacts'] = Contacts::get()[0];
        $modules['MainSettings'] = MainSettings::first();
        $modules['MainSettings']["model_show_on_site"] = MainSettings::get__model_show_on_site();
        $modules['Cart'] = CartController::getSettings();

        $LastOrderId = Order::orderby('id', 'desc')->first();
        if($LastOrderId && isset($LastOrderId->id)){
            $modules['LastOrderId'] = $LastOrderId->id;
        }else{$modules['LastOrderId'] = 0;}

        //Проверим, может мы вернулись от банка и он дал добро
        if(($request->get('orderId'))&& strlen($request->get('orderId'))>0){
            //найдем закрываемый заказ:
            //сразу проверим, закрыт ли он
            $closing_order = Order::where('bank_orderId',$request->get('orderId'))->where('bank_response',null)->get();
            // dd($closing_order,$request->get('orderId'));
            if(isset($closing_order,$closing_order[0])){
                //Если такой заказ найден, то изменим его статус
                Order::where('bank_orderId',$request->get('orderId'))->where('bank_response',null)->update(['bank_response'=>'Оплачено']);
            }else{return redirect('/');}
        }
        if(!file_exists('../resources/views/'.$view.'.blade.php')){$view = 'index';}
        return view($view,$modules);
    }
    function post(Request $request){
        $newRequest = $request->all();

//        dd($newRequest);
//        return $newRequest;
        $modules['MainSettings'] = MainSettings::get()[0];
        if(isset($newRequest['Тип']) && $newRequest['Тип'] && strlen($newRequest['Тип'])>3){
            if($newRequest['Тип']=="Письмо директору"){
                $this->mail($newRequest,null,'tria.plyus@bk.ru');
                return ('Сообщение успешно отправлено');
            }
            if($newRequest['Тип']=="Подписка"){
                if(isset($newRequest["Имя"],$newRequest["Телефон"])){
                    $arr = Subscription::where('phone',$newRequest["Телефон"])->get();
                    if(isset($arr) && count($arr)>0){
                        return (['error'=>'Этот номер уже имеет подписку']);
                    }
//                    ;
                    $this->mail($newRequest);
//                    mail($modules['MainSettings']['mail'],$newRequest['Тип'],$text);
                    $newRequest["name"] = $newRequest["Имя"];
                    $newRequest["phone"] = $newRequest["Телефон"];
                    Subscription::create($newRequest);
                    return ('Подписка принята');
                }

            }
            if($newRequest['Тип']=="Заказ"){
                $telegram_text = '';
//                return $newRequest;
                $cart = json_decode($newRequest['Заказ']);

                $text = '';
//                dd($newRequest);
                foreach($newRequest as $key=>$value){
                    if(isset($newRequest["Доставка_или_самовывоз"]) && $newRequest["Доставка_или_самовывоз"]=="Доставка"){
                        if($key=='Место_самовывоза'){continue;}
                    }else{
                        if($key=='Адрес' || $key=='Квартира_или_офис'){
                            continue;
                        }
                    }
                    if($key!='Заказ'){
                        $procent='';
                        if($key=='Скидка'){$procent='%';}
                        $text.=$key.": ".$value.$procent."<br/>";
                    }
                }
//                dd($text);
                $text.="<br/><br/><h2><center>Состав заказа:</center></h2>";


//                dd($newRequest);
//                return $newRequest;


                $i=1;
                $text.="<table id='order_table'>";
                $text.="<tr>";

                $text.="<td><b>№п/п</b></td>";
                $text.="<td><b>Изображение</b></td>";
                $text.="<td><b>Название</b></td>";
                $text.="<td><b>Количество</b></td>";
                $text.="<td><b>Цена</b></td>";
                $text.="<td><b>Сумма</b></td>";

                $text.="</tr>";
                $summ=0;
                $sms_text="Привет, ".$newRequest['Имя']."\r\nВаш заказ:";
                foreach($cart as $price){
                    $text.="<tr>";

                    $text.="<td>".$i."</td>";
//                    $text.="<td>".$_SERVER['HTTP_REFERER']."/".$price["image"]."</td>";
                    $text.='<td><img src="'.$_SERVER['HTTP_REFERER']."/".$price->image.'"></td>';
//                    $text.="<td>".$price["title"]."</td>";
                    $text.="<td>".$price->title."</td>";
                    $sms_text.="\r\n".$price->title.'-'.$price->count;
//                    $text.="<td>".$price["count"]."</td>";
                    $text.="<td>".$price->count."</td>";
//                    $text.="<td>".$price["price"]."</td>";
                    $text.="<td>".$price->price."</td>";
//                    $text.="<td>".$price["price"]*$price["count"]."</td>";
                    $text.="<td>".$price->price*$price->count."</td>";

                    $text.="</tr>";
//                    $summ+=$price["price"]*$price["count"];
                    $summ+=$price->price*$price->count;


                    $telegram_text.="$price->title - $price->count шт. \r\n";

                    $i++;
                }
                $skidka=1;
                if(isset($newRequest['Скидка']) && isset($newRequest['Промокод'])){
                    $skidka=(100-(int)$newRequest['Скидка'])/100;
                    $sms_text.="\r\nСкидка:".$newRequest['Скидка'].'%';
                    $newSumm = $summ*$skidka;
                    $discountSumm = $summ - $newSumm;
                    $summ = $newSumm;

                    $text.="<tr>";

                    $text.="<td></td><td></td><td></td>";
                    $text.="<td>Промокод</td>";
                    $text.="<td><b>" . $newRequest['Промокод'] . "</b></td>";
                    $text.="<td></td>";

                    $text.="</tr>";

                    $text.="<tr>";

                    $text.="<td></td><td></td><td></td>";
                    $text.="<td>скидка</td>";
                    $text.="<td><b>" . $newRequest['Скидка'] . "%</b></td>";
                    $text.="<td><b>" . $discountSumm . " </b></td>";

                    $text.="</tr>";

                    $telegram_text .= "\r\n";
                    $telegram_text .= "Промокод: " . $newRequest['Промокод'] . "\r\n";
                    $telegram_text .= "Скидка: " . $newRequest['Скидка'] . "% - $discountSumm руб.\r\n";
                }

                $telegram_text.="Итого: $summ руб.";

                $sms_text.="\r\nНа сумму:".$summ;
                $modules['Contacts'] = Contacts::get()[0];
                $sms_text.="\r\nМы на сязи ".$modules['Contacts']->phone;

                $text.="<tr>";

                $text.="<td></td>";
                $text.="<td></td>";
                $text.="<td></td>";
                $text.="<td></td>";
                $text.="<td><b>ИТОГО:</b></td>";

                $text.="<td><b>".$summ."<b></td>";

                $text.="</tr>";
                $text.="</table>";

                $text.="<style>#order_table img{height: 70px;}</style>";

                $newRequest['adress'] = $newRequest['Адрес']." ".$newRequest['Квартира_или_офис'];
                $newRequest['name'] = $newRequest['Имя'];
                $newRequest['sostav'] = $text;
                $newRequest['comment'] = $newRequest['Комментарий'];
                $newRequest['payment'] = $newRequest['Оплата'];
                $newRequest['phone'] = $newRequest['Телефон'];
                $newRequest['summ'] = $summ;
                $newRequest['status'] = 'Не обработан';
                $newRequest['real_created'] = date('Y-m-d H:i:s');

                $telegram_text.="\r\n\r\nИмя: ".$newRequest['Имя']."\r\nТелефон: ".$newRequest['Телефон'];
                $telegram_text.="\r\n".$newRequest['Доставка_или_самовывоз'];
                if($newRequest['Доставка_или_самовывоз']=='Самовывоз'){
                    $telegram_text.="\r\nМесто самовывоза: ".$newRequest["Место_самовывоза"];
                    $telegram_text.="\r\nСумма с учетом самовывоза: ".round($summ,2)." руб.";
                }

                $k = Order::create($newRequest);
                $order_id = ($k->id);

                if($newRequest['Оплата']=='Картой на сайте'){
                    $oplata = $this->oplata_sber($order_id,$summ);
                    if($oplata){
                        $this->mail($newRequest,$text);
                        $this->smsc_api($newRequest['phone'],$sms_text);
                        $this->message_to_telegram('Поступил заказ №'.$k->id."\r\nОплата на сайте.\r\nДля проверки статуса оплаты задите в панель администратора\r\n\r\n".$telegram_text);
                        return (['redirect'=>$oplata['success']]);
                    }else{
                        return (['error'=>'Произошла ошибка. Попробуйте обновить страницу и повторить действие']);
                    }
                }else{
                    $this->message_to_telegram('Поступил заказ №'.$k->id."\r\n\r\nОпалата: ".$newRequest['Оплата']."\r\n\r\n".$telegram_text);
                    return ('Спасибо!<br>Ваш заказ принят.<br>Менеджер свяжется с Вами в ближайшее время');
                }
            }
        }
        return($request);
    }

    function message_to_telegram($text)
    {
        // сюда нужно вписать токен вашего бота
        $TELEGRAM_TOKEN = '1089211119:AAHYxIhP3em5bL3RmIGC9l9WqFJmjEkriCE';

        $responses_id = ['-1001335005529'];
        foreach($responses_id as $TELEGRAM_CHATID){
            $ch = curl_init();
            curl_setopt_array(
                $ch,
                array(
                    CURLOPT_URL => 'https://api.telegram.org/bot' . $TELEGRAM_TOKEN . '/sendMessage',
                    CURLOPT_POST => TRUE,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_POSTFIELDS => array(
                        'chat_id' => $TELEGRAM_CHATID,
                        'text' => $text,
                    ),
                )
            );
            curl_exec($ch);
        }
    }

    function mail($newRequest,$text=null,$email=null){
        $to      = MainSettings::get()[0]->mail;

        if(isset($email) && strlen($email)>0){$to=$email;}



        $subject = $newRequest['Тип'];
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .=  'To: Заказчик <'.$to.'>'.
                    'From: pitano@no-replay.com' . "\r\n";

        $message='';
        if(isset($text) && $text && strlen($text)>0){
            $message = $text;
        }else{foreach($newRequest as $key=>$value){$message.=$key.": ".$value."<br/>";}}


        return mail($to, $subject, $message, $headers);
    }

    function getNewOrders(){
        $orders = Order::where('status','Не обработан')->get();
        if(count($orders)>0){return 'alarm';};
//        return $orders;
    }

    function smsc_api($phone,$text){
        include_once "smsc_api.php";
        $phone = preg_replace('~[^0-9]+~','',$phone);
//        dd($phone,$text);
        $uri = 'http://api.smsfeedback.ru/messages/v2/send/?login=pitano&password=123456&sender=pitano.ru&phone=%2B'.$phone.'&text='.urlencode($text);
        $site = file_get_contents($uri);
//        dd($phone,$text);



//        require_once("ClassTransport.php");
//        $api = new ClassTransport();
//
//        $params = array(
//            "text" => $text
//        );
//        $phones = array("89237778899");
//
//        $send = $api->send($params,$phones);
//
//        dd($send,$balance = $api->balance());

//        dd(list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $text));
//        dd(list);
    }

    function promo($id=null){
        if(!isset($id)) return 'false';
        if(strlen($id)<3 || strlen($id)>15) return 'false';
//        return strlen($id);

        $code = Codes::where('code',$id)->get();
        if(!isset($code,$code[0])) return 'false';

        $code = $code[0];
        Codes::where('code',$id)->update(['usedCount'=>$code->usedCount+1]);
        return [
            'promo' => $code->code,
            'discount' => $code->skidka
        ];
//        $newRequest = $request->all();
//        return $id;
    }

    public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return view($view,$modules);
        }
    }

    /**
     * @param $order_id
     * $order_id - id (номер заказа)
     * $sum - сумма заказа в рублях
     *
     */
    function oplata_sber($order_id,$sum){
        $vars = array();
        $vars['userName'] = 'pitano-api';
        $vars['password'] = 'TMPp131213()+=';

// ID заказа в магазине.
        $vars['orderNumber'] = $order_id;

// Сумма заказа в копейках.
        $vars['amount'] = $sum * 100;

// URL куда клиент вернется в случае успешной оплаты.
        $vars['returnUrl'] = $_SERVER["HTTP_ORIGIN"].'/success';

// URL куда клиент вернется в случае ошибки.
        $vars['failUrl'] = $_SERVER["HTTP_ORIGIN"].'/error';

// Описание заказа, не более 24 символов, запрещены % + \r \n
        $vars['description'] = 'Заказ №' . $order_id . ' на '.$sum.'р.';

        $ch = curl_init('https://securepayments.sberbank.ru/payment/rest/register.do?' . http_build_query($vars));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        curl_close($ch);

//        dd(json_decode($res));
        $result = json_decode($res);
       // dd($result);
        if(isset($result->orderId) && $result->orderId && strlen($result->orderId)>0){
            Order::where('id',$order_id)->update(['bank_orderId'=>$result->orderId]);
            if(isset($result->formUrl) && $result->formUrl && strlen($result->formUrl)>0){
                return ['success'=>$result->formUrl];
            }
        }
//        if(isset($result->errorMessage) && $result->errorMessage && strlen($result->errorMessage)>0){
//            return $result->errorMessage;
//        }
        return false;
//        dd($result);
//        if()
    }


    static function get_products_modules($modules, $warehouse = null) {
        $modules['Dessert'] = is_null($warehouse) ? Dessert::get() : self::getProductsByWarehouse($warehouse, new Dessert());

        $k=null;
        foreach($modules['Dessert'] as $oneDessert){
            if(!$oneDessert->product_id){
                $k=1;
                Dessert::where('id',$oneDessert->id)->update(['product_id'=>'desserts_'.$oneDessert->id]);
            }
        }

        /*if($k){$modules['Dessert'] = Dessert::orderby('order')->get();}*/
		//$modules['Dessert'] = Dessert::orderby('order')->get();
        $modules['Dessert'] = is_null($warehouse) ? Dessert::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Dessert());

        $k=null;
        $modules['Salat'] = is_null($warehouse) ? Salat::get() : self::getProductsByWarehouse($warehouse, new Salat());
        foreach($modules['Salat'] as $onepPoduct){
            if(!$onepPoduct->product_id){
                $k=1;
                Salat::where('id',$onepPoduct->id)->update(['product_id'=>'salat_'.$onepPoduct->id]);
            }
        }
        if($k){$modules['Salat'] = is_null($warehouse) ? Salat::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Salat());}
		$modules['Salat'] = is_null($warehouse) ? Salat::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Salat());

        $k=null;
        $modules['Soup'] = is_null($warehouse) ? Soup::get() : self::getProductsByWarehouse($warehouse, new Soup());
        foreach($modules['Soup'] as $onepPoduct){
            if(!$onepPoduct->product_id){
                $k=1;
                Soup::where('id',$onepPoduct->id)->update(['product_id'=>'soup_'.$onepPoduct->id]);
            }
        }
        if($k){$modules['Soup'] = is_null($warehouse) ? Soup::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Soup());}
		$modules['Soup'] = is_null($warehouse) ? Soup::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Soup());

        $k=null;
        $modules['Sets'] = is_null($warehouse) ? Sets::get() : self::getProductsByWarehouse($warehouse, new Sets());
        foreach($modules['Sets'] as $onepPoduct){
            if(!$onepPoduct->product_id){
                $k=1;
                Sets::where('id',$onepPoduct->id)->update(['product_id'=>'set_'.$onepPoduct->id]);
            }
        }

        $modules['Sets'] = is_null($warehouse) ? Sets::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Sets());

        $k=null;
        $modules['Pasta'] = is_null($warehouse) ? Pasta::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Pasta());
        foreach($modules['Pasta'] as $onepPoduct){
            if(!$onepPoduct->product_id){
                $k=1;
                Pasta::where('id',$onepPoduct->id)->update(['product_id'=>'pasta_'.$onepPoduct->id]);
            }
        }
        if($k){$modules['Pasta'] = is_null($warehouse) ? Pasta::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Pasta());}
		$modules['Pasta'] = is_null($warehouse) ? Pasta::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Pasta());


        $k=null;
        $modules['Makaron'] = is_null($warehouse) ? Makaron::get() : self::getProductsByWarehouse($warehouse, new Makaron());
        foreach($modules['Makaron'] as $onepPoduct){
            if(!$onepPoduct->product_id){
                $k=1;
                Makaron::where('id',$onepPoduct->id)->update(['product_id'=>'makaron_'.$onepPoduct->id]);
            }
        }

        if($k){$modules['Makaron'] = is_null($warehouse) ? Makaron::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Makaron());}
		$modules['Makaron'] = is_null($warehouse) ? Makaron::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Makaron());


        $k=null;
        $modules['Hot'] = is_null($warehouse) ? Hot::get() : self::getProductsByWarehouse($warehouse, new Hot());
        foreach($modules['Hot'] as $onepPoduct){
            if(!$onepPoduct->product_id){
                $k=1;
                Hot::where('id',$onepPoduct->id)->update(['product_id'=>'hot_'.$onepPoduct->id]);
            }
        }
        if($k){$modules['Hot'] = is_null($warehouse) ? Hot::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Hot());}
        $modules['Hot'] = is_null($warehouse) ? Hot::orderby('order')->get() : self::getProductsByWarehouse($warehouse, new Hot());


        $k=null;
        $modules['Pinza'] = is_null($warehouse) ? Pinza::get() : self::getProductsByWarehouse($warehouse, new Pinza());
        foreach($modules['Pinza'] as $onepPoduct){
            if(!$onepPoduct->product_id){
                $k=1;
                Pinza::where('id',$onepPoduct->id)->update(['product_id'=>'pinza_'.$onepPoduct->id]);
            }
        }
//
        if($k){$modules['Pinza'] = is_null($warehouse) ? Pinza::get() : self::getProductsByWarehouse($warehouse, new Pinza());}


        return $modules;
    }

    public static function getProductsByWarehouse($warehouse, Model $model)
    {
        return $model::whereHas('restaurant', function ($query) use ($warehouse) {
                $query->where('restaurant_id', $warehouse);
            })->orderby('order')->get();
    }
}
