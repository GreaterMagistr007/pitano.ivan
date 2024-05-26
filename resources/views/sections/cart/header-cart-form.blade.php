<?
//    var_dump(date('H'));
$hourNow = date('H');
$isWorkingTime = true;
if($hourNow<10 || $hourNow>=22){$isWorkingTime=false;}
?>

<form action="/" class="order form form-small <?if(!$isWorkingTime)echo('notWorkingNow_new');?>">
    <button class="closeCart">

    </button>

    <input type="text" id="DeliveryOrSam" name="Доставка или самовывоз" hidden value="Доставка" style="display: none;">
    <div class="order-scroll">

        <div class="order-toggler cartToogler">Корзина</div>
        <div class="order-cart cart-content order-hidden" style="display: block"></div>
        <!-- <div class="order-cart order-hidden">
            <div class="order-cart__row">
                <div class="cart-item__image">
                    <img src="img/cart-1.png" alt="alt">
                </div>
                <div class="cart-item__head">пинза Пепперони с руккулой</div>
                <div class="cart-nav">
                    <div class="quantity">
                        <input type="number" min="1" max="9" step="1" value="1">
                    </div>
                </div>
                <div class="cart-item__price">490р.</div>
                <div class="cart-item__delete"></div>
            </div>
            <div class="order-cart__row">
                <div class="cart-item__image">
                    <img src="img/cart-2.png" alt="alt">
                </div>
                <div class="cart-item__head">кватро формаджио</div>
                <div class="cart-nav">
                    <div class="quantity">
                        <input type="number" min="1" max="9" step="1" value="1">
                    </div>
                </div>
                <div class="cart-item__price">490р.</div>
                <div class="cart-item__delete"></div>
            </div>
        </div> -->
        <div class="order-row mb-25">
            <div class="row">
                <div class="col-sm-6">
                    <div class="order-count">3 товара на сумму 1410 р.</div>
                </div>
                <div class="col-sm-6">
                    <div class="form-cart__row form form-small form-promo">
                        <input type="text" class="form-input magickWord" placeholder="Я знаю волшебное слово" min="10" max="10">
                        <button class="btn-promo">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M19.4594 7.8594C19.7503 7.38996 19.6056 6.77355 19.1362 6.48261L18.4116 6.03352C17.9422 5.74257 17.3257 5.88727 17.0348 6.3567L10.115 17.5217L3.06064 11.9442C2.6274 11.6017 1.99852 11.6752 1.65599 12.1084L1.12728 12.7771C0.784744 13.2104 0.858269 13.8392 1.2915 14.1818L9.28743 20.5037C9.32124 20.5314 9.35725 20.5572 9.39542 20.5809L10.12 21.03C10.5894 21.3209 11.2059 21.1762 11.4968 20.7068L19.4594 7.8594Z"
                                      fill="#F15A29"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <p style="text-align: right;">Промокод действует при заказе от 1500 руб.</p>
                </div>

            </div>
        </div>
        <div class="order-head">
            {{--                    Контактная информация:--}}
            <div class="samovivoz_selector_in_cart_block active fs13">
                Доставка
            </div>
            <div class="samovivoz_selector_in_cart_block really_samovivoz" style="
                            /*width: 80px;*/
                            /*display: inline;*/
                            /*position: relative;*/
                            /*right: -45px;*/
                            /*cursor: pointer;*/
                            /*white-space: nowrap;*/
                        "
                {{--                     onclick="setSamovivoz(this);"--}}
            >
                <div class="samovivoz" style="display: none!important; width: 16px;height: 16px;border: 2px solid gray;border-radius: 10px;display: inline-block;position: relative;top: 1px;cursor: pointer;">
                    <div class="samovivoz-active" style="width: 8px;height: 8px;border: 2px solid gray;border-radius: 10px;display: inline-block;position: absolute;top: 2px;left: 2px;background-color: gray;"></div>
                </div>
                {{--                        <label class="fs13" style="cursor: pointer;">Самовывоз -15%</label>--}}
                <label class="fs13" style="cursor: pointer;">Самовывоз</label>
            </div>

        </div>
        <div class="order-row">
            <div class="row">
                <input type="text" style="display: none" name="Тип" value="Заказ">
                <div class="col-sm-6 mb-15">
                    <label for="order-name" class="form-small__label">Имя*</label>
                    <input name="Имя" required type="text" id="order-name" class="">
                    {{--                        <div class="error">Неправильное имя</div>--}}
                </div>
                <div class="col-sm-6 mb-15">
                    <label for="order-phone" class="form-small__label">Телефон*</label>
                    <input name="Телефон" onkeydown="return checkFirstChar8(event.key,this);" required type="text" id="order-phone" class="form__phone" minlength="11">
                </div>
                <div class="order-row deactivate hidden" style="width: 100%;">
                    <div class="row pl-0 ml-0" style="justify-content: space-between;width: 100%;">
                        <input id="pickup_place" type="text" style="display: none" name="Место самовывоза" value="ТЦ СИЛЬВЕР МОЛЛ">
                        {{--                            <div class="col-sm-6 mb-15 delivery_checkbox active" value="ТЦ СИЛЬВЕР МОЛЛ">--}}
                        {{--                                <div class="checkbox_round">--}}
                        {{--                                    <div></div>--}}
                        {{--                                </div>--}}
                        {{--                                <label style="cursor: pointer;" >ТЦ СИЛЬВЕР МОЛЛ<br>Сергеева 3/5<br>+7(902)7637381</label>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-sm-6 mb-15 delivery_checkbox" value="ТЦ СЕЗОН">--}}
                        {{--                                <div class="checkbox_round">--}}
                        {{--                                    <div></div>--}}
                        {{--                                </div>--}}
                        {{--                                <label style="cursor: pointer;">ТЦ СЕЗОН<br>Свердлова, 36<br>+7(952)6261769</label>--}}
                        {{--                            </div>--}}

                        <div class="col-sm-12 mb-15 delivery_checkbox active" style="width: 100%" value="ТЦ СЕЗОН">
                            <div class="checkbox_round">
                                <div></div>
                            </div>
                            <label style="cursor: pointer; width: 100%"><b>130 квартал</b> 3 июля, 9 <b><a href="tel:+7(3952)506484">+7(3952)506-484</a></b></label>
                        </div>
                    </div>
                </div>
                {{--                    <div class="col-sm-12 mb-15 deactivate hidden">--}}
                {{--                        <label for="order-street" class="form-small__label">Откуда забирать</label>--}}
                {{--                        <input name="Адрес" class="address_input js_calculation_map_input" required type="text" id="order-street">--}}
                {{--                    </div>--}}
                <div class="col-sm-6 mb-15 deactivate">
                    <label for="order-street" class="form-small__label">Улица, номер дома*</label>
                    <input name="Адрес" class="address_input js_calculation_map_input" required type="text" id="order-street">
                </div>
                <div class="col-sm-6 mb-15 deactivate">
                    <label for="order-flat" class="form-small__label">Квартира / офис</label>
                    <input name="Квартира_или_офис" type="text" id="order-flat">
                </div>
            </div>
        </div>
        {{--            <p class="deliveryError" hidden>Добавьте в заказ товаров на сумму<br> <span id="minThisDelivery">800<span> рублей</p>--}}
        <p class="deliveryError" hidden>Пожалуйста, введите корректный адрес доставки</p>
        <!-- <div class="order-toggler deactivate">Увидеть на карте</div> -->
        <div class="order-hidden order-map mb-15 deactivate">
            <div id="map" style="width: 100%;height: 140px;"></div>
            <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&?apikey=3d29c5c5-814d-4a2b-882e-5be15f56ae22&onload=fid_33301333&coordorder=longlat"></script>
            {{--                <script type="text/javascript" charset="utf-8" async--}}
            {{--                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ade1b9e280248ca00930d2d7e90027b518cab849d7627c390f38a2f10f2a9d485&amp;width=490&amp;height=140&amp;lang=ru_RU&amp;scroll=true"></script>--}}

        </div>
        <div class="order-row mb-15">
            <label for="order-comment" class="form-small__label">Комментарий</label>
            <input name="Комментарий" type="text" id="order-comment">
        </div>
        <!-- блок десерта -->
        <?
        $CartDesert = ($Dessert[rand(0,count($Dessert)-1)]);
        ?>
        <div class="order-toggler">Добавьте к заказу вкусный десерт</div>
        <div class="order-row mb-15 productBlock" style="display: none;">
            <div class="row">
                <div class="col-sm-5" style="max-width: 42%!important;">
                    <img src="{{$CartDesert->image}}" alt="{{$CartDesert->title}}" class="productBlockImage" >
                </div>
                <div class="col-sm-7" style="max-width: 57%!important;">
                    {{--                        <div style="font-family: Open Sans;font-style: normal;font-weight: bold;font-size: 13px;line-height: 18px;color: #000000;margin-bottom: 15px;">Добавьте к заказу вкусный десерт:</div>--}}
                    <div class="card__content">
                        <div class="card__content-header">
                            <div class="card__content-head productBlockTitle">{{$CartDesert->title}}</div>
                            <div class="card__content-price productBlockPrice">{{$CartDesert->price}} р.</div>
                        </div>
                        <div class="card__content-text_content">{{$CartDesert->text}}</div>
                        <a href="#" class="btn btn--orange addCartButton" style="position: absolute;bottom: 4px;" onclick="$(this).closest('.productBlock').hide(400);">Добавить в корзину</a>
                    </div>
                </div>
            </div>


        </div>
        <!-- /блок десерта -->
        <div class="payment" style="">
            <div class="order-head deactivate" style="max-width: 40%;float: left;">Оплата:</div>
            <div class="deactivate" style="max-width: 40%;position: absolute;right: 0; padding-right: 10px;"><img src="/img/payIcons.png"></div>

            <div class="payment-row mb-25 deactivate" style="clear: both;">
                <div class="payment-choose" onclick="setActivePaymentMethod(this);">
                    <input type="radio" id="money" checked name="Оплата" value="Курьеру наличными">
                    <label >Курьеру наличными</label>
                </div>
                {{--                    <div class="payment-choose" onclick="setActivePaymentMethod(this);">--}}
                {{--                        <input type="radio" id="money" name="Оплата" value="Курьеру картой">--}}
                {{--                        <label >Курьеру картой</label>--}}
                {{--                    </div>--}}
                <div class="payment-choose" onclick="setActivePaymentMethod(this);">
                    <input type="radio" id="card" name="Оплата" value="Картой на сайте">
                    <label>Картой на сайте</label>
                </div>
                {{--                    <div class="payment-choose">--}}
                {{--                        <input type="radio" id="card" name="Оплата" value="Картой на сайте">--}}
                {{--                        <label for="card">Картой на сайте</label>--}}
                {{--                    </div>--}}
            </div>
            <div class="not_working">
                <p>Режим работы доставки с 10.00 до 22.00<br>Ваш заказ <span class="deactivate">будет доставлен</span><span class="deactivate hidden">можно забрать</span> в рабочее время</p>
            </div>
            <div class="form-row tl-center">

                <button type="submit" class="btn btn--bg successCart">Отправить</button>
            </div>
            <div class="form-row messageBox">
                <p>Поле "Я согласен с условиями договора оферты" не отмечено!</p>
            </div>
            <div class="form__checkbox">
                <input name="Согласие_на_обработку" type="checkbox" checked id="policy">
                <label  for="policy">Я согласен на <a href="/policy.pdf" target="_blank">обработку персональных данных</a></label>
            </div>
        </div>
    </div>
</form>






<style>
    .closeCart{
        background: url(/img/krest.svg);
        height: 16px;
        width: 16px;
        background-repeat: no-repeat;
        background-position: center;
        width: 16px;
        height: 16px;
        padding: 16px;
        background-color: white;
        border-radius: 50%;
        position: absolute;
        z-index: 1000;
        right: 10px;
        top: 10px;
    }
    .order-head .samovivoz_selector_in_cart_block.active{

        border: 2px solid #ababab;
        border-bottom: none;
    }
    .order-head .samovivoz_selector_in_cart_block{
        width: 43%;
        text-align: center;
        padding: 10px;
        /*border: 2px solid #ababab;*/
        z-index: 1;
        height: 42px;
        border-bottom:2px solid #ababab;
        background: white;
        cursor: pointer;
    }
    .order-head{
        display: flex;
        justify-content: space-around;
        /* padding: 10px; */
        /* border: 2px solid #ababab; */
        height: 42px;
        border-bottom: 2px solid #ababab;
    }
    /*.samovivoz.active{background-color: #f15a29;}*/
    /*.samovivoz.active{background-image: #f15a29;}*/
    .samovivoz .samovivoz-active{display: none!important;}
    /*.samovivoz.active .samovivoz-active{display: inline-block!important;}*/

    .fs13{
        font-size: 13px;
    }
    header.header{z-index: 1000;}

    .delivery_checkbox label{
        padding-left: 5px;
    }
    .delivery_checkbox{
        flex-direction: inherit;
        display: flex;
        width: 50%;
    }
    .delivery_checkbox.active .checkbox_round div{
        width: 8px;
        height: 8px;
        border: 2px solid gray;
        border-radius: 10px;
        display: inline-block;
        position: absolute;
        top: 2px;
        left: 2px;
        background-color: gray;
    }
    .delivery_checkbox .checkbox_round{
        width: 16px;
        height: 16px;
        border: 2px solid gray;
        border-radius: 10px;
        display: inline-block;
        position: relative;
        top: 1px;
        cursor: pointer;
    }
    .pl-0{padding-left: 0px;}
    .ml-0{margin-left: 0px;}

    .deliveryError{color: #934400;display: block;font-size: 15px;font-weight: bold;}

    @media only screen and (max-width: 450px){
        .card__content-text_content{display: none;}
        header.header .order-row .row .card__content .btn.btn--orange {font-size: 12px;}
    }

    .cart-row.productBlock .cart-item .cart-item__content .cart-item__content-bottom .cart-item__price .productBlockPrice{
        font-weight: 600;
        font-size: 15px;
        color: black;
    }
    .cart-row.productBlock .cart-item .cart-item__content .cart-item__content-bottom{
        width: 50%;
    }
    .cart-row.productBlock .cart-item .cart-item__content .productBlockTitle{
        width: 50%;
        font-weight: 600;
        font-size: 15px;
        color: black;
    }
    .cart-row.productBlock .cart-item .cart-item__content{
        display: flex;
        width: 100%;
    }

    .not_working{display: none;}
    .notWorkingNow_new .not_working{display: block;}
    .not_working p{
        width: 80%;
        background: #f15a29;
        color: white;
        margin: 0 auto;
        margin-bottom: 15px;
        text-align: center;
        padding: 10px;
    }
</style>
