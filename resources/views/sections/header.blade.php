<header class="header">
    <div class="container" style="max-width: 1400px;">
        <div class="new_logo_ochag">
            <a href="https://pitano.ru">
                {{--            <strong>Pizza</strong>Pitano--}}
                            <img src="/img/logo1.svg">
            </a>
        </div>


        @include('sections.tilda-menu')
{{--        @include('sections.figma-menu')--}}
        <div class="header-row">
            <div class="hamburger hamburger--vortex">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
            <div class="logo logo--header">
                <img src="img/logo1.svg" alt="alt">
            </div>

            <script>
                if(document.querySelector('.figma_menu')){
                    document.querySelector('.logo.logo--header').remove();
                }
            </script>
            <nav class="main-nav desktop">
                <ul class="main-list">
                    @if($MainSettings["model_show_on_site"]->Salat->show)
                        <li><a href="#salads">Салаты</a></li>
                    @endif
                    @if($MainSettings["model_show_on_site"]->Dessert->show)
                        <li><a href="#desserts">Десерты</a></li>
                    @endif
                    @if($MainSettings["model_show_on_site"]->Makaron->show)
                        <li><a href="#makaron">Паста</a></li>
                    @endif
                    @if($MainSettings["model_show_on_site"]->Soup->show)
                        <li><a href="#soups">Супы</a></li>
                    @endif
                    @if($MainSettings["model_show_on_site"]->Hot->show)
                        <li><a href="#hot">Горячее</a></li>
                    @endif
                    <li><a class="btn-modal" href="#delivery" data-effect="mfp-zoom-out">Условия доставки</a></li>


{{--                    <li><a href="#pinza">Пицца</a></li>--}}
{{--                    <li><a href="#salads">Салаты и закуски</a></li>--}}
{{--                    <li><a href="#soups">Супы</a></li>--}}
{{--					<li><a href="#Pastas">Паста</a></li>--}}
{{--                    <li><a href="#desserts">Десерты</a></li>--}}
{{--                    <li><a class="btn-modal" href="#delivery" data-effect="mfp-zoom-out">Доставка</a></li>--}}
                </ul>
            </nav>

            <div class="choose-warehouse">
{{--                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <g id="Navigation / Map_Pin">--}}
{{--                        <g id="Vector">--}}
{{--                            <path d="M5 9.92285C5 14.7747 9.24448 18.7869 11.1232 20.3252C11.3921 20.5454 11.5281 20.6568 11.7287 20.7132C11.8849 20.7572 12.1148 20.7572 12.271 20.7132C12.472 20.6567 12.6071 20.5463 12.877 20.3254C14.7557 18.7871 18.9999 14.7751 18.9999 9.9233C18.9999 8.08718 18.2625 6.32605 16.9497 5.02772C15.637 3.72939 13.8566 3 12.0001 3C10.1436 3 8.36301 3.7295 7.05025 5.02783C5.7375 6.32616 5 8.08674 5 9.92285Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                            <path d="M10 9C10 10.1046 10.8954 11 12 11C13.1046 11 14 10.1046 14 9C14 7.89543 13.1046 7 12 7C10.8954 7 10 7.89543 10 9Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        </g>--}}
{{--                    </g>--}}
{{--                </svg>--}}
                <select class="round" name="warehouses" id="warehouses" onchange="setRestaurant(this)">
                    @forelse($Restaurants as $restaurant)
                        @if($restaurant->id == Session::get('warehouse'))
                            <option class="option" value="{{ $restaurant->id }}" selected>{{ $restaurant->name }}</option>
                        @else
                            <option class="option" value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                        @endif
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="header-cart__wrap">
                <div class="header-cart">
                    <img src="{!! $Cart->cart_button_inner_image !!}" alt="корзина">
                    <span class="header-cart__num" style="
                    background-color: {!! $Cart->cart_button_product_count_badge_background_color !!};
                    color: {!! $Cart->cart_button_product_count_badge_font_color !!};
                    "></span>
                </div>
                <div class="cart">
                    <div class="cart-wrap">
                        <div class="cart-head">
                            <img src="img/basket.svg" alt="alt">
                            <span>3 товара в корзине</span>
                        </div>
{{--                        <div class="cart-content">--}}

                            <!-- <div class="cart-row">
                                <div class="cart-item">
                                    <div class="cart-item__image">
                                        <img src="img/cart-1.png" alt="alt">
                                    </div>
                                    <div class="cart-item__content">
                                        <div class="cart-item__head">пинза Пепперони с руккулой</div>
                                        <div class="cart-item__content-bottom">
                                            <div class="cart-nav">
                                                <div class="quantity">
                                                    <input type="number" min="1" max="9" step="1" value="1">
                                                </div>
                                            </div>
                                            <div class="cart-item__price">490р.</div>
                                            <div class="cart-item__delete"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-row">
                                <div class="cart-item">
                                    <div class="cart-item__image">
                                        <img src="img/cart-2.png" alt="alt">
                                    </div>
                                    <div class="cart-item__content">
                                        <div class="cart-item__head">кватро формаджио</div>
                                        <div class="cart-item__content-bottom">
                                            <div class="cart-nav">
                                                <div class="quantity">
                                                    <input type="number" min="1" max="9" step="1" value="1">
                                                </div>
                                            </div>
                                            <div class="cart-item__price">460р.</div>
                                            <div class="cart-item__delete"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-row">
                                <div class="cart-item">
                                    <div class="cart-item__image">
                                        <img src="img/cart-2.png" alt="alt">
                                    </div>
                                    <div class="cart-item__content">
                                        <div class="cart-item__head">кватро формаджио</div>
                                        <div class="cart-item__content-bottom">
                                            <div class="cart-nav">
                                                <div class="quantity">
                                                    <input type="number" min="1" max="9" step="1" value="1">
                                                </div>
                                            </div>
                                            <div class="cart-item__price">460р.</div>
                                            <div class="cart-item__delete"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-row">
                                <div class="cart-item">
                                    <div class="cart-item__image">
                                        <img src="img/cart-2.png" alt="alt">
                                    </div>
                                    <div class="cart-item__content">
                                        <div class="cart-item__head">кватро формаджио</div>
                                        <div class="cart-item__content-bottom">
                                            <div class="cart-nav">
                                                <div class="quantity">
                                                    <input type="number" min="1" max="9" step="1" value="1">
                                                </div>
                                            </div>
                                            <div class="cart-item__price">460р.</div>
                                            <div class="cart-item__delete"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
{{--                        </div>--}}
                        <div action="/" class="form form-small form-promo mb-15">
                            <div class="form-cart__row">
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
                        <form action="/" class="form form-cart">
                            <div class="form-cart__content">
                                <div class="form-cart__content-row">
                                    <span>Всего товаров:</span>
                                    <span class="bold">3</span>
                                </div>
                                <div class="form-cart__content-row">
                                    <span>На сумму:</span>
                                    <span class="bold">1410 р.</span>
                                </div>
								<!--
                                <div class="form-cart__content-row ostatok">
                                    <span>До заказа:</span>
                                    <span class="bold summ"> р.</span>
                                </div>
								-->
                            </div>
                            <div class="form-row">
                                <div class="btn btn--orange btn--order" onclick="ym(55182217, 'reachGoal', 'to-basket');gtag('event','click', { 'event_category' : 'to-basket'});">Заказать</div>
                            </div>
                            <div class="form__checkbox">
                                <input type="checkbox" required checked id="policyCart">
                                <label for="policyCart">Я согласен на <a href="/policy.pdf" target="_blank">обработку персональных данных</a></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?
//    var_dump(date('H'));
    $hourNow = date('H');
    $isWorkingTime = true;
    if($hourNow<10 || $hourNow>=22){$isWorkingTime=false;}
    ?>

{{--        <form action="/" class="order form form-small" style="text-align: center;">--}}
{{--            <img src="/img/notWorking.svg" alt="" style="width: 70%;">--}}
{{--        </form>--}}

        <form action="/" class="order form form-small <?if(!$isWorkingTime)echo('notWorkingNow_new');?>">
            <button class="closeCart">

            </button>

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
            </style>
            <script>
                document.querySelector('.closeCart').addEventListener('click',function(el){
                    hideCart();
                });
            </script>
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
                        <p style="text-align: right;">Промокод действует при заказе от {!! $Cart->min_promocode_sum !!} руб.</p>
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
                <style>
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
                </style>

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
                        <script>
    //отловим событие нажатия клавиши на инпуте. Надо исключить "8"
    function checkFirstChar8(key,elem){
        if(key=='8' && elem.value.length==0){
            elem.value = '+7 (';
            return false;
        }
    }


    // document.querySelector('#order-phone').addEventListener('keydown',function(){
    //     if(this.value.length==0 && event && event.key && event.key=='8'){
    //         console.log('Устанавливаем значение');
    //         event.key = false;
    //         event.code = false;
    //         console.log(event.key);
    //         console.log(event.code);
    //         return false;
    //     }
    // });
                        </script>
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
                        <style>
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
                            .
                        </style>
                        <script>
                            document.querySelectorAll('.delivery_checkbox').forEach(function(elem){
                                elem.addEventListener('click',function(){
                                    document.querySelectorAll('.delivery_checkbox.active').forEach(function(el){el.classList.remove('active')});
                                    this.classList.add('active');
                                    document.querySelector('input#pickup_place').value = this.getAttribute('value');
                                });
                            });
                        </script>
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
            <style>
                .deliveryError{color: #934400;display: block;font-size: 15px;font-weight: bold;}
            </style>
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
//            $CartDesert = ($Dessert[rand(0,count($Dessert)-1)]);

            // Сгенерируем случайный массив из нужного количества десертов
            $cartDesserts = [];
            while (count($cartDesserts) < $Cart->desert_block_product_count) {
                $index = rand(0, count($Dessert) - 1);
                if (!in_array($index, $cartDesserts)) {
                    $cartDesserts[] = $index;
                }
            }

            ?>
            <div class="order-toggler">Добавьте к заказу вкусный десерт</div>
            @foreach ($cartDesserts as $dessertIndex)
                <?
                    $CartDesert = $Dessert[$dessertIndex];
                ?>
                <div class="order-row mb-15 productBlock cartDessertBlock" style="display: none;">
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

                    <style>
                        @media only screen and (max-width: 450px){
                            .card__content-text_content{display: none;}
                            header.header .order-row .row .card__content .btn.btn--orange {font-size: 12px;}
                        }
                    </style>
                </div>
            @endforeach
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
                    <script>
                        // document.querySelectorAll('.payment .payment-row .payment-choose').forEach(function(el){
                        //     el.addEventListener('click',function(){
                        //         setActivePaymentMethod(this);
                        //     });
                        // });

                        function setActivePaymentMethod(payment_choose_div){
                            console.log(event);
                            document.querySelectorAll('.payment .payment-row .payment-choose input').forEach(function(elem){
                                elem.removeAttribute('checked');
                            });
                            console.log(payment_choose_div);
                            payment_choose_div.querySelector('input').setAttribute('checked',true);
                        }
                    </script>
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


</header>
<script>
    window.addEventListener('load',function(){
        var notWorkingNow = document.querySelector('.order.form.form-small.notWorkingNow');
        if(notWorkingNow){
            // var notWorkingNowItems = notWorkingNow.children;
            // for(var i=0;i<notWorkingNowItems.length;i++){
            //     notWorkingNowItems[i].style.display = 'none!important';
            // }
            // var image = document.createElement('img');
            // image.src = "/img/notWorking.jpg";
            // image.style.width = '70%';
            // notWorkingNow.appendChild(image);


            notWorkingNow.innerHTML='<img src="/img/notWorking.jpg" alt="" style="width: 70%;">';
        }
    })
</script>
<script>
    function setRestaurant(event) {
        document.location.href = '/warehouse/' + event.options[event.selectedIndex].value;
    }
</script>
<style>
    .notWorkingNow{text-align: center;}
</style>
{{--@include('sections.tilda-mobile-menu')--}}
@include('sections.tilda-new-mobile-menu')

{{--Стрый вариант меню:--}}
{{--<nav class="main-nav mobile">--}}
{{--    <ul class="main-list">--}}
{{--        <li><a href="#pinza">Пицца</a></li>--}}
{{--        <li><a href="#salads">Салаты</a></li>--}}
{{--        <li><a href="#soups">Супы</a></li>--}}
{{--		<li><a href="#Pastas">Паста</a></li>--}}
{{--        <li><a href="#desserts">Десерты</a></li>--}}
{{--        <li><a class="btn-modal" href="#delivery" data-effect="mfp-zoom-out">Доставка</a></li>--}}
{{--    </ul>--}}
{{--    <div class="mobile-menu">--}}
{{--        <div class="mobile-menu__top">--}}
{{--            <div class="header-contacts">--}}
{{--                <a href="tel:+{{$Contacts->phone}}" onclick="ym(55182217, 'reachGoal', 'telephone'); ga ('send', 'event', 'lead', 'telephone'); return true;" class="header-contacts__phone linked">{{$Contacts->phone}}</a>--}}
{{--                <div class="header-contacts__address">{{$Contacts->adress}}</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="mobile-menu__bottom">--}}
{{--            <div class="footer-info__head">{{$MainSettings->footerText}}</div>--}}
{{--            <a href="{{$Contacts->instagramm}}" class="social" target="_blank">--}}
{{--                <img src="img/instagram-black.svg" alt="alt">--}}
{{--                <span>pizza.pitano</span>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
{{--/Стрый вариант меню:--}}

<style>
    .deactivate.hidden{display: none!important;}

     .new_logo_ochag{
         display: none;
     }
    @media only screen and (max-width: 992px){
        .logo.logo--header img{
            display: flex;
            max-height: 32px;
        }
    }

    @media only screen and (min-width: 993px){
        .new_logo_ochag img{
            /*width: 115px;*/
            /*height: auto;*/
            height: 60px;
        }
        .new_logo_ochag{
            width: 200px;
            position: absolute;
            display: block;
            padding: 2px;
            text-align: center;
        }
        .tilda_menu{
            /*padding-top: 5px;*/
            margin-bottom: 8px;
        }
        .header-row,.tilda_menu{
            padding-left: 200px;
        }
        .tilda_menu--logo,.logo.logo--header{
            display: none;
        }
        .tilda_menu nav {
            width: 700px;
        }
        .header-row .header-contacts a {
            font-size: 20px;
        }
        .header-row .main-nav.desktop {
            width: 700px;
        }
        header.header .container{
            min-height: 65px;
        }
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

    .unselectable {
        -moz-user-select: none;
        -o-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        user-select: none;
    }

    /*Широкая кнопочка в корзину:*/
    .btn--orange{width: 90%!important;max-width: none}
    .btn--orange::before{width: 100%!important;    height: 80px;}
    .btn--orange::after{width: 90%!important;}
</style>
<script>
    function setSamovivoz(elem){
        elem.querySelector('.samovivoz').classList.toggle('active');
        var cartBlock = document.querySelector('header form.order');
        cartBlock.querySelectorAll('.deactivate').forEach(function(elem){elem.classList.toggle('hidden');});
        if(elem.querySelector('.samovivoz.active')){
            cartBlock.querySelector('#order-street').removeAttribute('required');
            cartBlock.querySelector('.payment-row input').click();

            document.querySelector('#DeliveryOrSam').value='Самовывоз';

        }else{
            cartBlock.querySelector('#order-street').setAttribute('required',true);
            document.querySelector('#DeliveryOrSam').value='Доставка';
        }
        repaintCart();
    }

    let check_samovivoz_selector = '.order-head .samovivoz_selector_in_cart_block';
    document.querySelectorAll(check_samovivoz_selector).forEach(function(el){
        el.classList.add('unselectable');
        el.addEventListener('click',function(){
            let old_elem = document.querySelector('.order-head .samovivoz_selector_in_cart_block.active');
            document.querySelectorAll(check_samovivoz_selector).forEach(function(elem){elem.classList.remove('active')});
            this.classList.add('active');

            if(old_elem!=this){
                setSamovivoz(document.querySelector('.order-head .samovivoz_selector_in_cart_block.really_samovivoz'));
            }
        });
    });
</script>
