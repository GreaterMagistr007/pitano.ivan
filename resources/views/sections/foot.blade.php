<div class="modal mfp-hide mfp-with-anim" id="delivery" data-effect="mfp-zoom-out">
    <div class="modal-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="modal-content__wrap" style="padding-left: 50px;padding-right: 50px;">
                    {!! $MainSettings->delivery !!}
                    <a href="tel:{{$Contacts->phone}}" class="modal-phone">{{$Contacts->phone}}</a>
                    <div class="deliveryPriceBlocksInBodal">
                        <div class="col-md-4" style="background-color: #24AD10">от 1500 р.</div>
                        <div class="col-md-4" style="background-color: #FF9D32">от 2000 р.</div>
                        <div class="col-md-4" style="background-color: #EC534E">от 2500 р.</div>
                    </div>
                    <style>
                        .deliveryPriceBlocksInBodal{width: 100%;display: inline-flex;padding-top: 10px;}
                        .deliveryPriceBlocksInBodal div{
                            padding: 5px;
                            color: white;
                            font-family: Open Sans;
                            font-style: normal;
                            font-weight: bold;
                            font-size: 20px;
                            line-height: 27px;
                            position: relative;
                            right: 15px;
                            margin-left: 10px;
                            margin-right: 10px;
                            height: 40px;
                            height: fit-content;
                        }
                        @media only screen and (max-width: 530px){
                            .deliveryPriceBlocksInBodal div{font-size: 11pt;}
                        }
                        @media only screen and (max-width: 450px){
                            /*.deliveryPriceBlocksInBodal div{font-size: 8pt;}*/
                            .deliveryPriceBlocksInBodal{
                                width: 135%;
                                position: relative;
                                left: -40px;
                            }
                        }
                        @media only screen and (max-width: 374px){
                            .deliveryPriceBlocksInBodal div{
                                padding: 2px;
                            }
                            .deliveryPriceBlocksInBodal{
                                width: 300px;
                                left: -45px;
                            }
                        }

                        @media only screen and (max-width: 426px){
                            #delivery .modal-content .modal-content__wrap .modal-phone{
                                font-size: 20px;
                            }
                        }

                    </style>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="modal-content__map">
                    {!! $MainSettings->mapSRC !!}
	{{--<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Adc0a5f9e068fe43064b5c1a785645292f00482562fa629c236b6941da781189c&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>--}}
{{--					<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Abe4e703e92ba11ee585a2ed585c541a36c0c7e2775d6123713bc78321031cd6a&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>--}}
                    <?php
//                    echo('<!--');
//                    var_dump($MainSettings->mapSRC);
//                    echo('-->');
                    ?>
{{--                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ade1b9e280248ca00930d2d7e90027b518cab849d7627c390f38a2f10f2a9d485&amp;width=540&amp;height=540&amp;lang=ru_RU&amp;scroll=true"></script>--}}
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal mfp-hide mfp-with-anim" id="agreement" data-effect="mfp-zoom-out">
    <div class="modal-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="modal-content__wrap">
                    {!! $MainSettings->agreement !!}
                    <a href="tel:{{$Contacts->phone}}" class="modal-phone">{{$Contacts->phone}}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal mfp-hide mfp-with-anim" id="oferta" data-effect="mfp-zoom-out">
    <div class="modal-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="modal-content__wrap">
                    {!! $MainSettings->oferta !!}
                    <a href="tel:{{$Contacts->phone}}" class="modal-phone">{{$Contacts->phone}}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal mfp-hide mfp-with-anim" id="organization" data-effect="mfp-zoom-out">
    <div class="modal-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="modal-content__wrap">
                    {!! $MainSettings->organization !!}
                    <a href="tel:{{$Contacts->phone}}" class="modal-phone">{{$Contacts->phone}}</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal mfp-hide mfp-with-anim" id="thanks" data-effect="mfp-zoom-out" style="max-width: 360px;border-radius: 10px;">
    <div class="modal-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="modal-content__wrap" style="    padding: 0;">
                    <img src="img/otbiv.svg" alt="">
{{--                    text--}}
{{--                    <a href="tel:{{$Contacts->phone}}" class="modal-phone">{{$Contacts->phone}}</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<a hidden class="btn-modal" id="showThanksForm" href="#thanks" data-effect="mfp-zoom-out">Доставка</a>









<a class="btn-modal" id="openPriceModal" href="#priceModal" data-effect="mfp-zoom-out" style="display: none"></a>
<div class="modal mfp-hide mfp-with-anim" id="priceModal" data-effect="mfp-zoom-out">
    <div class="modal-content">
        <div class="row">
            <div class="container">
                <div data-id="salat_1" class="productBlock row" style="width: 100%;">
                    <div class="col-sm-7 modal__image_block">
                        <img class="productBlockImage" src="images/uploads/9e420e048a8c8fdac4c516410a2bc818.jpg"alt="alt" style="width: 90%;height: auto;">
                    </div>
                    <div class="col-sm-4" style="position: relative">
                        <div style="height: 100px;position: absolute;top: 0;bottom: 0;margin: auto 0;">
                            {{--                        <div class="card__content-header" style="margin-top: 55%;">--}}
                            <div class="card__content-header">
                                <div class="card__content-head productBlockTitle">САЛАТ СО СВЕКЛОЙ</div>
                                <div class="card__content-price productBlockPrice" style="position: relative;top: -18px;">
                                    265 р.
                                </div>
                            </div>
                            <p style="max-width: 80%;">Салат с печеной свеклой, рукколой, грецким орехом и сыром Горгонзолла.</p>
                            @include('sections.product-count-block')
                            <!--Для цезаря-->
                            <div class="cesar_cart_block" hidden>
                                <a class="btn addCartButton" onclick="setCesar('kurica','с курицей','290');">
                                    <img src="/img/kurica.svg">
                                </a>
                                <a class="btn addCartButton" onclick="setCesar('krevetka','с креветками','350');">
                                    <img src="/img/krevetka.svg">
                                </a>
                                <a class="btn addCartButton" onclick="setCesar('semga','с сёмгой','365');">
                                    <img src="/img/semga.svg">
                                </a>
                            </div>
                            <style>
                                .cesar_cart_block{width: 100%;}
                                .cesar_cart_block a {
                                    width: 30%;
                                    cursor: pointer;
                                }
                                .cesar_cart_block a:hover{
                                    -webkit-box-shadow: 0px 0px 22px 10px rgba(241,90,41,1);
                                    -moz-box-shadow: 0px 0px 22px 10px rgba(241,90,41,1);
                                    box-shadow: 0px 0px 22px 10px rgba(241,90,41,1);
                                }
                                @media only screen and (max-width: 768px){
                                    #priceModal .productBlockImage{display: none;}
                                    #priceModal .productBlockPrice{display: none;}
                                    #priceModal .productBlock div.col-sm-4{min-height: 285px;    top: -35px;}
                                }
                            </style>
                            <!--//Для цезаря-->
                            <a href="#" class="btn btn--orange addCartButton nonCesar" onclick="getNeedleSelectorOfThisElAndParent(this,'.modal',15).querySelector('.mfp-close').click();">Добавить в корзину</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal mfp-hide mfp-with-anim" id="writeDirectorModal" data-effect="mfp-zoom-out" style="max-width: 360px;border-radius: 10px;">
    <div class="modal-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="contacts-content tl-center" style="width: 290px">
                    <h2 class="h2 h2--small" style="font-family: Open Sans;font-size: 16px;line-height: 22px;display: flex;align-items: center;text-align: left;text-transform: none;">
                        Напишите директору сети
                        <br/>
                        ваши вопросы и пожелания
                    </h2>
                    <form action="/" class="form form-contacts" onsubmit="ym(55182217, 'reachGoal', 'quest'); gtag('event','quest', { 'event_category' : 'lead'});">
                        <input type="text" style="display: none" name="Тип" value="Письмо директору">
                        <div class="form-row" style="margin-top: 25px;">
                            <input type="text" name="Имя" class="form-input" required="" minlength="3" maxlength="15" placeholder="Михаил">
                        </div>
                        <div class="form-row">
                            <input type="text" name="Телефон" class="form-input form__phone" required="" minlength="12" placeholder="+7(924)000-00-00" maxlength="18">
                        </div>
                        <div class="form-row">
                            <textarea name="Сообщение" class="form-input" required="" placeholder="Сообщение" maxlength="150" style="border: 1px solid #ababab;
                                                                                                                                    width: 100%;
                                                                                                                                    height: 100px;
                                                                                                                                    font-size: 18px;
                                                                                                                                    padding: 8px 14px;
                                                                                                                                    font-family: 'Open Sans', sans-serif;
                                                                                                                                    font-weight: 300;
                                                                                                                                    color: #000;"></textarea>
                        </div>
                        <div class="form-row">
                            <button class="btn btn--bg">Отправить</button>
                        </div>
                        <div class="form-row messageBox">
                            <p>Поле "Я согласен с условиями договора оферты" не отмечено!</p>
                        </div>
                        <div class="form-row">
                            <div class="form__checkbox">
                                <input type="checkbox" checked="" id="policy">
                                <label for="policy">Я согласен с условиями <a class="btn-modal" href="#oferta" data-effect="mfp-zoom-out">договора оферты</a></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '467624584122317');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=467624584122317&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->





<script src="js/scripts.min.js"></script>
<script src="js/common.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .messageBox{display: none;}
    .messageBox p{font-size: 9pt;}
    .messageBox.error{display: block;}
    .messageBox.success{display: block;}
    .messageBox.error p{color: red;}
    .messageBox.success p{color: green;}
    .magickWord.error:hover{border-color: #e32323;}
    .magickWord.error:hover{border-color: #e32323;}

    .magickWord.success:hover{border-color: #00af00;}
    .magickWord.success{border-color: #00af00;}

    .btn-promo.success{display: none;}

</style>
<script>



    let sections = document.querySelectorAll('.cards');
    $(window).scroll(function() {
        let height_screen = document.documentElement.clientHeight;

        $('.main-nav.desktop a.active').removeClass('active');
        $('.main-nav.mobile a.active').removeClass('active');
        let last_elem;
        let stopudovo = null;
        sections.forEach(function(el){
            let top = el.getBoundingClientRect().top;
            let bottom = el.getBoundingClientRect().bottom;
            if((top-height_screen)<0){
                last_elem = el.id;
                // console.log(el);
                // console.log('top:'+top);
                // console.log('bottom:'+bottom);
                // console.log('height_screen:'+height_screen);
                // console.log('top-height_screen:'+(top-height_screen));

                if(top>0 && bottom<height_screen){stopudovo = el.id;}
            }
        });
        if(stopudovo){last_elem=stopudovo;}
        $('.main-nav.desktop a[href="#'+last_elem+'"]').addClass('active');
        $('.main-nav.mobile a[href="#'+last_elem+'"]').addClass('active');
    });
</script>
<style>
    .main-nav.mobile .main-list li a {
        font-weight: normal;
    }
    .main-nav.mobile a.active{
        color: #000;
        font-weight: bold!important;
    }
    .main-nav.desktop a.active{
        color: #EA5300;
        font-weight: 600;
    }



</style>
<script>
    $('.smoothScroll').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 65
        }, 500, 'linear');
    });
</script>

<script>

    function set_button_title_for_products_in_cart(){
        //Если товара нет в корзине, меняем кнопку обратно на базовую
        document.querySelectorAll('.btn.btn--orange.addCartButton[renamed]').forEach(function(el){
            console.log('Проверим блок: '+el);
            let parent = getNeedleSelectorOfThisElAndParent(el,'.productBlock',10);
            if(parent){
                let id = parent.getAttribute('data-id');
                console.log('Убираем отметку обратно у товара '+id);
                if(id && !issetInCart(id)){
                    el.textContent = 'Добавить в корзину';
                    el.removeAttribute('renamed');
                }
            }
        });

        for(let i in Cart){
            console.log(Cart[i]['data_id']);
            document.querySelectorAll('.productBlock[data-id="'+Cart[i]['data_id']+'"] .btn.btn--orange.addCartButton').forEach(function(el){
                console.log(el);
                el.textContent = 'Заказать еще';
                el.setAttribute('renamed',true);
            });
        }
    }


        //проверим оплату в первую очередь:
        var params = window
            .location
            .search
            .replace('?','')
            .split('&')
            .reduce(
                function(p,e){
                    var a = e.split('=');
                    p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
                    return p;
                },
                {}
            );
        // console.log( params['orderId']);
        if(params['orderId']){
            //если страница загрузилась с ключем в адресе, значит, мы вернулись с  удачной оплаты:

			console.log(params['orderId']);

			var mfpContainer = document.querySelector('.mfp-container');
			var flag = false;
			//if(!mfpContainer){
				setInterval(function() {
					console.log('Проверка оплаты');
					if(!mfpContainer){
						console.log('Объект не найден');
						document.querySelector('#showThanksForm').click();
						mfpContainer = document.querySelector('.mfp-container');
					}else{
						console.log('Объект Найден');
						if(!flag){
							console.log('вешаем событие');
							mfpContainer.addEventListener('click',function(){window.location.reload();clearCart();});
							flag=true;
						}
					}
				}, 300);
			//}
            //$('.mfp-container').on('click',function(){window.location.reload();});
        }


	$(window).on('load',function(){




        $('.btn-promo').on('click',function(){
            console.log('magickWord');
            event.preventDefault();
            var magickWordBlock = this.parentNode.querySelector(".magickWord");
            var magickWord = magickWordBlock.value;

            if(magickWord.length<3 || magickWord.length>15){$(magickWordBlock).addClass('error'); return false;}

            $.ajax( {
                type: "POST",
                url: '/promo/'+magickWord,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function( response ) {
                    // console.log(response);
                    if (!response.promo) {
                        $(magickWordBlock).addClass('error');
                        return false;
                    }
                    let promo = response.promo;
                    let skidka = parseInt(response.discount);

                    if(promo && !isNaN(skidka)){
                        let discountText = skidka > 0 ? 'Скидка '+skidka+'% учтена' : 'Скидка учтена';
                        $(".magickWord").removeClass('error').addClass('success').attr('readonly','true').attr('placeholder','Скидка '+skidka+'%').val(discountText);
                        $('.btn-promo').addClass('success');

                        document.querySelector('#order-phone').parentNode.innerHTML+='<input type="text" hidden value="'+skidka+'" name="Скидка" style="display:none">';
                        document.querySelector('#order-phone').parentNode.innerHTML+='<input type="text" hidden value="'+promo+'" name="Промокод" style="display:none">';
                        // $('form.order')
                        repaintCart();
                        return false;
                    }
                    $(magickWordBlock).addClass('error');
                    return false;
                    //
                },
                error: function(response){
                    // window.location.reload();
                }
            });
        });
    });


       // console['log'] = function(e) {
       //     return false;
       // }

</script>

<script>
    $('body').on('click',function(){
        var mobilnoeMenu = document.querySelector('.main-nav.mobile');
        var korzina1 = document.querySelector('.cart');
        var korzina2 = document.querySelector('.order.form.form-small');
        //сверим мобильное меню:
            //если оно есть и закрыто,
        if((mobilnoeMenu && !mobilnoeMenu.classList.contains('open')) &&
            //Если первая корзина есть и закрыта
            (korzina1 && !korzina1.classList.contains('open')) &&
            //Если вторая корзина есть и закрыта
            (korzina2 && !korzina2.classList.contains('open'))
        ){
            if(this.classList.contains('hidden')){
                this.classList.remove('hidden');
                document.querySelector('html').classList.remove('hidden');
            }
        }
        if(!cartCount()){
            hideCart();
        }

        let mobule_menu_open = document.querySelector('.main-nav.mobile.open');
        let button_mobile_menu_close = document.querySelector('.hamburger.hamburger--vortex.is-active');
        let target = event.target;
        if(mobule_menu_open && button_mobile_menu_close && target && !getNeedleSelectorOfThisElAndParent(target,'.hamburger.hamburger--vortex')
            //&& !getNeedleSelectorOfThisElAndParent(target,'.main-nav.mobile.open',10)
        ){
            button_mobile_menu_close.click();
        }
    });


    $('form.order *').on('click',function(){$('form.order').click();});
    $('#order-street').on('keyup',function(){$('form.order').click();});
    $('#order-street').on('keydown',function(){$('form.order').click();});
    $('#order-street').on('change',function(){$('form.order').click();});
    $('.form.form-cart').on('click',function(){$('form.order').click();});


    document.querySelector('.header-cart__wrap').addEventListener('click',function(){
        document.querySelector('.cart').classList.remove('open');
    });

    let $cart_2 = $('.order.form.form-small');
    function showCart(){
        if(cartCount()){
            console.log('нет класса');
            $cart_2.addClass('open');
            $('.header-cart').addClass('active');
        }
    }
    function hideCart(){
        console.log('Скрываем');
        $cart_2.removeClass('open');
        $('.header-cart').removeClass('active');
    }
    $('.header-cart').click(function() {
        document.querySelector('.cart ').classList.remove('open');

        if($(this).hasClass('active')){
            hideCart();
        }else{
            showCart();
        }
        // setTimeout(function() {
        //     let $cart_2 = $('.order.form.form-small');
        //     console.log($cart_2);
        //     if($cart_2.hasClass('open')){
        //         console.log('убираем');
        //         $cart_2.removeClass('open');
        //     }else{
        //         console.log('Добавляем');
        //         $cart_2.addClass('open');
        //     }
        // }, 300);
        // if($('.order.form.form-small').hasClass('open')){
        //     console.log('прячем');
        // }else{
        //     console.log('Показываем');
        // }
        $('.main-nav').removeClass('open')
    })

    $('form').on('click',function(){
        if(this.querySelector('[value="Заказ"]')){
            checkAdressAndSumm();
        }
    });

    $('.btn--order').on('click',function(){
        if(this.querySelector('[value="Заказ"]')){
            checkAdressAndSumm();
        }
    });
    $('form').on('submit',function(){
        event.preventDefault();
        var $this_form = $(this);
        var $button = $this_form.find('button[type="submit"]');

        var submit_button = $button[0];

        if(submit_button){
            if(submit_button.hasAttribute('disabled')){return false;}
            submit_button.setAttribute('disabled',true);
            setTimeout(function() {
                submit_button.removeAttribute('disabled');
            }, 2000);
        }




        console.log($this_form,$button,$(this));

        // return false;




        var data = $(this).serialize();
        if($(this).find('#policy')[0]){
            if(!$(this).find('#policy')[0].checked){
                $(this).find('.messageBox').addClass('error');
                $(this).find('.messageBox').removeClass('success');
                $(this).find('.messageBox p').html('Поле "Я согласен с условиями договора оферты" не отмечено!');
                return false;
            }
        }

        var messageBox = $(this).find('.messageBox');
        if(this.querySelector('[value="Заказ"]')){
            if(!checkAdressAndSumm()) return false;
            data = data+'&Заказ=' + JSON.stringify(Cart);
        }
        console.log('Отправка формы');

        $.ajax( {
            type: "POST",
            url: '/mail',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function( response ) {
                //метрика
                if(document.querySelector('.samovivoz.active')){
                    ym(55182217, 'reachGoal', 'samovivoz'); gtag('event','samovivoz', { 'event_category' : 'lead'});
                }else{ym(55182217, 'reachGoal', 'dostavka'); gtag('event','dostavka', { 'event_category' : 'lead'});}
                $(messageBox).removeClass('error');
                $(messageBox).addClass('success');
                $(messageBox).find('p').html(response);
                console.log( response );
                //Если пришла ссылка на оплату
                if(response['redirect']){
					var a = document.createElement('a');
					a.setAttribute('href',response['redirect']);
					document.querySelector('body').appendChild(a);
					a.click();
                    //window.open(response['redirect']);
                }
                if(response=='Спасибо!<br>Ваш заказ принят.<br>Менеджер свяжется с Вами в ближайшее время'){
                    clearCart();
                    $('#showThanksForm').click();
                    $('.mfp-container').on('click',function(){window.location.reload();});

                    // window.location.reload();
                }
                if(response['error']){
                    $(messageBox).removeClass('success');
                    $(messageBox).addClass('error');
                    $(messageBox).find('p').html(response['error']);
                }
            },
            error: function(response){
                $(messageBox).removeClass('success');
                $(messageBox).addClass('error');
                $(messageBox).find('p').html(response);
                console.log( response );
            }
        } );
    });

    function checkAdressAndSumm(minDeliverySum = null,error = false){
		minDeliverySum = {!! $Cart->min_delivery_sum !!};
        if(!error){
            var address_input = document.querySelector('.order .address_input');
            if(address_input && address_input.hasAttribute('required') && address_input.value.length<5){
                error = 'Пожалуйста, введите корректный адрес доставки';
            }
            minDeliverySum = $('.successCart').attr('data-minDeliverySum');
            // console.log(parseInt(minDeliverySum));
            // console.log(summCart());
            // console.log(parseInt(minDeliverySum)<parseInt(summCart()));

			minDeliverySum = {!! $Cart->min_delivery_sum !!};
            if(parseInt(minDeliverySum)!=NaN && parseInt(minDeliverySum)>parseInt(summCart())){
                // error = 'Минимальная сумма доставки в выбранную зону составляет '+minDeliverySum+" руб.";
                let ostatok = minDeliverySum-summCart();
                error = 'Добавьте в заказ товаров на сумму '+ostatok+" рублей.";
            }
        }
        // console.log('error:');
        // console.log(error);
        if(error && !document.querySelector('.samovivoz.active')){
            $('.successCart').hide();
            $('.deliveryError').html(error);
            $('.deliveryError').show();
            return false;
        }else{
            $('.successCart').show();
            $('.deliveryError').hide();
            return true;
        }

    }
    $('body').on('click',function(){
        checkAdressAndSumm();
    });
</script>
<script>if(window.innerWidth<600){document.querySelector('.cart-content').style.overflowY='scroll';}</script>
<script>

    //метрика:
    $('section.cards .addCartButton').on('click',function(){
        ym(55182217, 'reachGoal', 'add-cart-page');
        gtag('event','click', { 'event_category' : 'add-cart-page'});
    });
    $('.modal-content .addCartButton').on('click',function(){
        ym(55182217, 'reachGoal', 'add-cart-cart');
        gtag('event','click', { 'event_category' : 'add-cart-cart'});
    });

    $('.addCartButton').on('click',function(){
        event.preventDefault();

        let productBlock = getNeedleSelectorOfThisElAndParent(this,'.productBlock',7);
        if (!productBlock) {
            return;
        }

        let count = 1;
        let productCount = productBlock.querySelector('input.productCount');
        if (productCount && productCount.value) {
            count = parseInt(productCount.value);
        }

        count = count > 0 ? count : 1;

        addToCart(productBlock, count);
    });
    $( document ).ready(function() {
        repaintCart();
    });
</script>
<script>
    var Cart = {};

    loadCart();

    function saveCart() {
        localStorage.setItem('Cart', JSON.stringify(Cart)); //Cart в строку
    }

    function loadCart() {
        //проверяю есть ли в localStorage запись Cart
        if (localStorage.getItem('Cart')) {
            Cart = JSON.parse(localStorage.getItem('Cart'));
        }
    }

    function addToCart(thisElem = null, count = 1) {
        if(thisElem){
            var data_id = thisElem.getAttribute('data-id');
            console.log(data_id);
            if(issetInCart(data_id)){
                // console.log('Есть уже такой товар');
                Cart[data_id].count = parseInt(Cart[data_id].count)+parseInt(count);

                Cart[data_id].title = thisElem.querySelector('.productBlockTitle').innerHTML;
                Cart[data_id].price = parseInt(thisElem.querySelector('.productBlockPrice').innerHTML);
                Cart[data_id].image = thisElem.querySelector('.productBlockImage').getAttribute('src');
            }else{
                Cart[data_id] = {};
                Cart[data_id].count = parseInt(count);
                Cart[data_id].data_id = data_id;

                Cart[data_id].title = thisElem.querySelector('.productBlockTitle').innerHTML;
                Cart[data_id].price = parseInt(thisElem.querySelector('.productBlockPrice').innerHTML);
                Cart[data_id].image = thisElem.querySelector('.productBlockImage').getAttribute('src');
                // console.log('нет еще такого товара');
            }
            saveCart();
            repaintCart();
            getCart();
        }
    }

    function setCartCount(thisElem,count){
        if(thisElem){
            var data_id = thisElem.getAttribute('data-id');
            if(!count){return deleteFromCart(data_id);}
            if(isNaN(parseInt(count))){return deleteFromCart(data_id);}
            if(parseInt(count)>0){Cart[data_id].count = parseInt(count);}
            if(parseInt(count)<1){return deleteFromCart(data_id);}
            saveCart();
            repaintCart();
        }
    }

    function getCart(){
        console.log(Cart);
    }

    function clearCart(){
        Cart = {};
        saveCart();
        getCart();
    }

    function deleteFromCart(data_id){
        delete Cart[data_id];
        saveCart();
        repaintCart();
        getCart();
    }

    function cartCount(){
        var q = 0;
        for(var i in Cart){
            if(Cart[i] && Cart[i]!=undefined && Cart[i].count && !isNaN(Cart[i].count) && Cart[i].count>0){
                q+=1;
            }
        }
        return q;
    }

    function summCart(){
        var summ = 0;
        for(var i in Cart){
            summ+=parseInt(Cart[i].price)*parseInt(Cart[i].count);
        }
        var skidka = document.querySelector('[name="Скидка"]');
        // console.log(skidka);
        if(skidka){skidka=skidka.value;}
        if(skidka && parseInt(skidka)>0 && parseInt(skidka)<100){
            summ=parseInt(summ)*((100-parseInt(skidka))/100);
        }
        if(document.querySelector('.samovivoz.active')){
            // summ=parseInt(summ)*0.85;
            summ=parseInt(summ);
        }


		var ostatok = document.querySelector('.ostatok');

        //if(document.querySelector('header .container .header-cart__wrap .cart form .btn.btn--orange.btn--order')){
        //    document.querySelector('header .container .header-cart__wrap .cart form .btn.btn--orange.btn--order').style.display='block';
        //    if(ostatok){ostatok.style.display = 'none';}
        //    if(parseInt(summ)<800){
        //        ostatok.querySelector('.summ').innerHTML = (800-parseInt(summ))+' р.';
        //        ostatok.style.display = 'flex';
        //        document.querySelector('header .container .header-cart__wrap .cart form .btn.btn--orange.btn--order').style.display='none';
        //    }
        //}


        return summ;
    }

    function sclonenie(count){
        if (count==0){return ' товаров ';}
        if (count==1){return ' товар ';}
        if (count>1 && count<5){return ' товара ';}
        if (count>4 && count<21){return ' товаров ';}
        if (count==21){return ' товар ';}
        if (count>21 && count<25){return ' товара ';}
        if (count>24 && count<31){return ' товаров ';}
        if (count==31){return ' товар ';}
        if (count>31 && count<35){return ' товара ';}
        if (count>34 && count<41){return ' товаров ';}
        if (count==41){return ' товар ';}
        if (count>41 && count<45){return ' товара ';}
        if (count>44 && count<51){return ' товаров ';}
        if (count==51){return ' товар ';}
        if (count>51 && count<55){return ' товара ';}
        if (count>54 && count<61){return ' товаров ';}
        if (count==61){return ' товар ';}
        if (count>61 && count<65){return ' товара ';}
        if (count>64 && count<71){return ' товаров ';}
        if (count==71){return ' товар ';}
        if (count>71 && count<75){return ' товара ';}
        if (count>74 && count<81){return ' товаров ';}
        if (count==81){return ' товар ';}
        if (count>81 && count<85){return ' товара ';}
        if (count>84 && count<91){return ' товаров ';}
        if (count==91){return ' товар ';}
        if (count>91 && count<95){return ' товара ';}
        if (count>94 && count<101){return ' товаров ';}
        if (count==101){return ' товар ';}
    }

    function repaintCart(){
        //Поменяем текст на кнопках товара:
        set_button_title_for_products_in_cart();

        //количество товара в корзине на значке
        if(document.querySelector('.header-cart__num')){
            document.querySelector('.header-cart__num').innerHTML = parseInt(cartCount());
        }

        //количество товара в моделке "корзина"
        $('.cart-head span').html(parseInt(cartCount())+sclonenie(cartCount())+'в корзине');
        $('.form-cart__content-row .bold').html(parseInt(cartCount()));
        // document.querySelector('.form-cart__content-row .bold').innerHTML = parseInt(cartCount());
        // if(cartCount()>0){
            //отрисовка товаров:
            var text = '';
            for(var i in Cart){
                text+='<div class="cart-row productBlock" data-id="';
                text+=i;
                text+='"> <div class="cart-item"> <div class="cart-item__image"> <img src="';
                text+=Cart[i].image;
                text+='" alt="alt" class="mCS_img_loaded productBlockImage"> </div><div class="cart-item__content"> <div class="cart-item__head productBlockTitle">';
                text+=Cart[i].title;
                text+='</div><div class="cart-item__content-bottom"> <div class="cart-nav"> <div class="quantity"> <input type="number" min="1" max="9" step="1" value="';
                text+=Cart[i].count;
                text+='"><div class="quantity-nav"><div class="quantity-button quantity-up cartPlus"></div><div class="quantity-button quantity-down cartMinus"></div></div></div></div><div class="cart-item__price productBlockPrice">';
                text+=Cart[i].price;
                text+='р.</div><div class="cart-item__delete" onclick="deleteFromCart(`';
                text+=i;
                text+='`);"></div></div></div></div></div>';
            }
            var cartContent = document.querySelector('#mCSB_2_container');
            if(!cartContent){cartContent =document.querySelector('.cart-content')};
            $(cartContent).html(text);
            if(document.querySelectorAll('.form-cart__content-row')[1]){
                document.querySelectorAll('.form-cart__content-row')[1].querySelector('span.bold').innerHTML = summCart()+' р.';
            }

            $('.cartMinus').on('click',function(){
                $(getNeedleSelectorOfThisElAndParent(this,'.quantity').querySelector('input')).val(parseInt($(getNeedleSelectorOfThisElAndParent(this,'.quantity').querySelector('input')).val())-1);
                $(getNeedleSelectorOfThisElAndParent(this,'.quantity').querySelector('input')).change();
            });
            $('.cartPlus').on('click',function(){
                $(getNeedleSelectorOfThisElAndParent(this,'.quantity').querySelector('input')).val(parseInt($(getNeedleSelectorOfThisElAndParent(this,'.quantity').querySelector('input')).val())+1);
                $(getNeedleSelectorOfThisElAndParent(this,'.quantity').querySelector('input')).change();
            });
            $('.quantity input').on('change',function(){
                setCartCount(getNeedleSelectorOfThisElAndParent(this,'.productBlock',9),$(this).val());
                console.log($(this).val())
            });


            $('.cart-wrap *').show();
            $('.cart').css('top','60px');
            // $('.cart-wrap form').show();

            $('.order-count').text(parseInt(cartCount())+sclonenie(cartCount())+' на сумму '+summCart()+' р.');
        // }else{
        if(cartCount()<1){
            $('.header-cart__num').html('');
            $('.cart-head span').html('Корзина пока пуста');
            $('.cart-wrap form').hide();
            var cartChild =  document.querySelector('.cart-wrap').children;
            for (var i = cartChild.length - 1; i >= 0; i--) {
                if(cartChild[i].className!='cart-head'){
                    $(cartChild[i]).hide();
                }
            }
            // $('.cart-wrap *').hide();
            // $('.cart-wrap .cart-head').show();
            $('.cart').css('top','0');
            $('.cart').css('height','auto');
            // $('.cart').css('max-width','100%');

            $('.cart').on('click',function(){$('.header-cart').click();});
        }

    }




    /**
    *   Функция проверяет наличие товара в корзине
    *   по его data_id
    **/
    function issetInCart(data_id){
        for(var i in Cart){
            if(Cart[i].data_id==data_id && Cart[i].count && Cart[i].count>0){
                return true;
            }
        }
        return false;
    }

    /**
     * Функция сналача проверит, имеет ли основной элемент запрашиваемый селектор,
     * а потом будет искать родителя с таким селектором
     *
     * Выше тега HTML не ищет
     *
     * ограничение по умолчанию - 5-я вложимость
     *
     * возвращает найденный элемент
     *
     * elem - основной элемент
     * selector - искомый селектор
     * lvl - уровень вложимости
     */
    function getNeedleSelectorOfThisElAndParent(elem,selector,lvl=5){
        if(elem.matches(selector)){return elem}
        var i=0;
        var par = elem;
        while(i<lvl){
            par = par.parentNode;
            if(!par){return undefined;}
            if(par.tagName=='HTML'){return undefined;}
            if(par.matches(selector)){return par}
            i++;
        }
        return undefined;
    }
</script>

<script>
    window.addEventListener('load',function(){
        if(document.querySelector('.cartToogler')){
            // document.querySelector('.cartToogler').addEventListener('click',function(){document.querySelector('.header-cart').click();$('.order').removeClass('open')});
        }

    });

</script>

<script>
    // (function(w,d,u){
    //     var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
    //     var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    // })(window,document,'https://cdn.bitrix24.ru/b11607924/crm/site_button/loader_1_75main.js');
</script>

<style>
    @media only screen and (min-width: 768px){
        .productBlock .card__image img{cursor: pointer;}
        .productBlock .card__content .card__content-header{cursor: pointer;}
        .productBlock .card__content p{cursor: pointer;}

        .productBlock .card-main__item-image img{cursor: pointer;}
        .productBlock .card-main__item-content .card__content-header{cursor: pointer;}
        .productBlock .card-main__item-content p{cursor: pointer;}
    }

</style>
<script>
    window.addEventListener('load',function(){
        $('.productBlock .card__image img').on('click',function(){productClick(event.target);});
        $('.productBlock .card__content .card__content-header').on('click',function(){productClick(event.target);});
        $('.productBlock .card__content p').on('click',function(){
            if (event.target && event.target.classList && event.target.classList.contains('productCount')) {
                return;
            }
            productClick(event.target);
        });

        $('.productBlock .card-main__item-image img').on('click',function(){productClick(event.target);});
        $('.productBlock .card-main__item-content .card__content-header').on('click',function(){productClick(event.target);});
        $('.productBlock .card-main__item-content p').on('click',function(){productClick(event.target);});

        $('.addCartButton_cesar').on('click',function(){
            event.preventDefault();
            productClick(this,true);
        });
    });

    function productClick(target,isCesar=false){
        var thisProduct = getNeedleSelectorOfThisElAndParent(target,'.productBlock',10);
        if(thisProduct.querySelector('.addCartButton_cesar')){isCesar=true;}
        if(!getNeedleSelectorOfThisElAndParent(target,'header.header',17) && (window.innerWidth>768) || isCesar){
            // var thisProduct = getNeedleSelectorOfThisElAndParent(target,'.productBlock',10);
            var modal = document.querySelector('#priceModal');

            if(thisProduct.querySelector('.productBlockModalImage')){
                modal.querySelector('.productBlockImage').src = thisProduct.querySelector('.productBlockModalImage').src;
            }else{
                modal.querySelector('.productBlockImage').src = thisProduct.querySelector('.productBlockImage').src;
            }

            modal.querySelector('.productBlockTitle').innerHTML = thisProduct.querySelector('.productBlockTitle').innerHTML;
            modal.querySelector('.productBlockPrice').innerHTML = thisProduct.querySelector('.productBlockPrice').innerHTML;

            var cartContent = thisProduct.querySelector('.card__content p');
            if(!cartContent){cartContent = thisProduct.querySelector('.card-main__item-content p');}

            modal.querySelector('.productBlock .col-sm-4 p').innerHTML =cartContent.innerHTML;

            modal.querySelector('.productBlock').setAttribute('data-id',thisProduct.getAttribute('data-id'));

            // узнаем количество добавляемого товара и покажем его в модалке:
            let count = 1;
            let productCount = thisProduct.querySelector('input.productCount');
            if (productCount && productCount.value) {
                count = parseInt(productCount.value);
            }
            if (count < 1) {
                count = 1;
            }

            let modalProductCount = modal.querySelector('input.productCount');
            if (modalProductCount) {
                modalProductCount.value = count;
            }

            if(isCesar){
                $(modal.querySelector('.nonCesar')).hide();
                $(modal.querySelector('.cesar_cart_block')).show();
            }else{
                $(modal.querySelector('.nonCesar')).show();
                $(modal.querySelector('.cesar_cart_block')).hide();
            }

            //Покажем блок с изображением:
            modal.querySelector('.productBlockImage').classList.remove('hidden');
            //Удалим старые изображения, если они были:
            // modal.querySelectorAll('.temp_image').forEach(function(el){el.remove();});
            //Удалим старый слайдер, если он был:
            modal.querySelectorAll('.slider_block').forEach(function(el){el.remove();});
            //Если есть дополнительные изображения, то мутим слайдер:
            let image_blocks = thisProduct.querySelectorAll('.card__slider_images');
            let modal__image_block = modal.querySelector('.modal__image_block');
            if(image_blocks.length){
                //Скроем основное изображение:
                modal.querySelector('.productBlockImage').classList.add('hidden');
                //создадим слайдер-блок:
                let slider_block = document.createElement('div');
                slider_block.classList.add('slider_block');
                modal__image_block.appendChild(slider_block);

                image_blocks.forEach(function(el){
                    let image = document.createElement('img');
                    image.src = el.getAttribute('data_slider_image');
                    image.classList.add('temp_image');
                    slider_block.appendChild(image);
                });

                $(slider_block).slick({
                    rows: false,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    speed: 1000,
                    pauseOnHover: false,
                })
            }



            // console.log(thisProduct);
            //метрика:
            ym(55182217, 'reachGoal', 'open-cart');gtag('event','click', { 'event_category' : 'open-cart'});
            ///метрика
            document.querySelector('#openPriceModal').click();
        }
    }

    function setCesar(id,title,price){
        var modal = document.querySelector('#priceModal');
        modal.querySelector('.productBlockTitle').innerHTML='Цезарь '+title;
        modal.querySelector('.productBlock').setAttribute('data-id','salat_6_cesar_'+id);
        modal.querySelector('.productBlockPrice').innerHTML = price;
        modal.querySelector('.mfp-close').click();
    }
</script>


<div id="writeDirector" onclick="this.querySelector('a').click();">
    <a class="btn-modal" href="#writeDirectorModal" data-effect="mfp-zoom-out" style="display:none;"></a>
</div>
<style>
    .hidden{
        display: none!important;
    }
    #writeDirector{
        bottom: 35px;
        right: 35px;
        height: 45px;
        width: 45px;
        background-image: url(img/director.svg);
        position: fixed;
        cursor: pointer;
        border-radius: 25px;
    }
    #writeDirector:hover{
        -webkit-box-shadow: 3px 3px 10px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 3px 3px 10px 0px rgba(0,0,0,0.75);
        box-shadow: 3px 3px 10px 0px rgba(0,0,0,0.75);
    }
</style>












<script>
$('window').on('load',function(){$('.order-toggler').click();});
    window.order_obj = {

        geo: false,

        check_address: function() {
            $self = $(".js_calculation_map_input");
            address = $self.val()
            if(address.length > 4){
//запрашиваем координату
                ymaps.geocode("Иркутск, "+address).then(function(res){
                    //если пришел ответ:
                    if (res.geoObjects.get(0)) {
                        //удаляем старую координату
                        if (order_obj.geo) {
                            map.geoObjects.remove(order_obj.geo)
                        }
                        //тут обрабатываем полученную точку
                        order_obj.geo = res.geoObjects.get(0);
                        //добавляем на карту
                        map.geoObjects.add(order_obj.geo)
                        //получаем координаты
                        coords = order_obj.geo.geometry.getCoordinates();
                        //устанавливаем центр карты
                        map.setCenter(coords)
                        //настройка зума
                        map.setZoom(16)
                        // alert(123);
                        var minDeliverySum = 0;
                        map.geoObjects.each(function(r){
                            if(r.geometry && r.geometry._coordPath && r.geometry._coordPath._coordinates && r.geometry.contains(coords)){
                                if(r.properties && r.properties._data && r.properties._data.balloonContent){
                                    var text = r.properties._data.balloonContent;
                                    var str = '';
                                    if(text){str = text.replace('Бесплатная доставка от ', '');}
                                    if(str){minDeliverySum = parseInt(str);}
                                }
                            }
                        });
						minDeliverySum = {!! $Cart->min_delivery_sum !!};
                        if(minDeliverySum && minDeliverySum>0){
                            // console.log('minDeliverySum:'+parseInt(minDeliverySum));
                            // console.log('summCart:'+parseInt(summCart()));
                            $('.successCart').attr('data-minDeliverySum',minDeliverySum);
                            checkAdressAndSumm();

                        }else{
                            checkAdressAndSumm(null,'Доставка в выбранную зону не осуществляется');
                            // console.log('Доставка в выбранную зону не осуществляется');
                        }


                    }
                })
            }
        }
    }

    $(".js_calculation_map_input").change(function() {
        order_obj.check_address();
    })
    $(".js_calculation_map_input").keyup(function() {
        order_obj.check_address();
    })

    var objects = [];
    var events = {};
    var map;


function fid_33301333(ymaps) {
    // alert("Обрабатываем карту");

    try{}catch(e){alert(e);}
    objects["map"] = map = new ymaps.Map(
        "map",
        {
            center: [104.280660,52.296387],
            zoom: 11,
            type: "yandex#map",
            controls:[],
            behaviors:['scrollZoom','drag','dblClickZoom']
        }
    );
    //далее попробуем отрисовать многоугольник:
    let zone_1000 = new ymaps.GeoObject({
        // Описываем геометрию геообъекта.
        geometry: {
            // Тип геометрии - "Многоугольник".
            type: "Polygon",
            // Указываем координаты вершин многоугольника.
            coordinates: [
                // Координаты вершин внешнего контура.
                zone_1000_coordinates
            ],
            // Задаем правило заливки внутренних контуров по алгоритму "nonZero".
            fillRule: "nonZero"
        },
        // Описываем свойства геообъекта.
        properties:{
            // Содержимое балуна.
            balloonContent: "Бесплатная доставка от 1000 рублей"
        }},{
        // Описываем опции геообъекта.
        // Цвет заливки.
        fillColor: '#00FF00',
        // Цвет обводки.
        strokeColor: '#00FF00',
        // Общая прозрачность (как для заливки, так и для обводки).
        opacity: 0.5,
        // Ширина обводки.
        strokeWidth: 5,
        // Стиль обводки.
        // strokeStyle: 'shortdash'
    });

    let zone_500 = new ymaps.GeoObject({
        // Описываем геометрию геообъекта.
        geometry: {
            // Тип геометрии - "Многоугольник".
            type: "Polygon",
            // Указываем координаты вершин многоугольника.
            coordinates: [
                // Координаты вершин внешнего контура.
                zone_500_coordinates
            ],
            // Задаем правило заливки внутренних контуров по алгоритму "nonZero".
            fillRule: "nonZero"
        },
        // Описываем свойства геообъекта.
        properties:{
            // Содержимое балуна.
            balloonContent: "Бесплатная доставка от 500 рублей"
        }},{
        // Описываем опции геообъекта.
        // Цвет заливки.
        fillColor: '#FF0000',
        // Цвет обводки.
        strokeColor: '#FF0000',
        // Общая прозрачность (как для заливки, так и для обводки).
        opacity: 0.5,
        // Ширина обводки.
        strokeWidth: 5,
        // Стиль обводки.
        // strokeStyle: 'shortdash'
    });

    let zone_800 = new ymaps.GeoObject({
        // Описываем геометрию геообъекта.
        geometry: {
            // Тип геометрии - "Многоугольник".
            type: "Polygon",
            // Указываем координаты вершин многоугольника.
            coordinates: [
                // Координаты вершин внешнего контура.
                zone_800_coordinates
            ],
            // Задаем правило заливки внутренних контуров по алгоритму "nonZero".
            fillRule: "nonZero"
        },
        // Описываем свойства геообъекта.
        properties:{
            // Содержимое балуна.
            balloonContent: "Бесплатная доставка от 800 рублей"
        }},{
        // Описываем опции геообъекта.
        // Цвет заливки.
        fillColor: '#FF9D32',
        // Цвет обводки.
        strokeColor: '#FF9D32',
        // Общая прозрачность (как для заливки, так и для обводки).
        opacity: 0.5,
        // Ширина обводки.
        strokeWidth: 5,
        // Стиль обводки.
        // strokeStyle: 'shortdash'
    });

    map.geoObjects.add(zone_1000);
    map.geoObjects.add(zone_500);
    map.geoObjects.add(zone_800);




    //order_obj.check_address();
}

let zone_1000_coordinates = [
    [104.11516466546863, 52.36156443729239],
    [104.1321737357132,52.36547188690466],
    [104.18125634815533,52.3529526291164],
    [104.19383675888105,52.342677390752925],
    [104.20514326196044,52.350617663296504],
    [104.20753629576492,52.36015678523825],
    [104.19241050174654,52.366973106806086],
    [104.1992560466626,52.37715004438561],
    [104.22130833461681,52.37737506484168],
    [104.25566786740828,52.366049785197454],
    [104.2736331712615,52.35014560954394],
    [104.26823093121872,52.33394410133725],
    [104.2742869151996,52.31811167626564],
    [104.26523457344334,52.31195466332153],
    [104.25413333805511,52.29970298408447],
    [104.25067518633091,52.29861864941089],
    [104.21625861710068,52.29444471514074],
    [104.2077798781298,52.308935459694524],
    [104.11516466546863,52.36156443729239]
];

let zone_500_coordinates = [
    [104.17917100949722, 52.2573394757548],
    [104.1836187703028, 52.2598837743059],
    [104.19002190150944, 52.26104145674902],
    [104.18641556461662, 52.2643081803098],
    [104.19305972031013, 52.267278427179825],
    [104.19408968857181, 52.265777616082126],
    [104.19689500437694, 52.26725034164416],
    [104.19145757192629, 52.27341439264558],
    [104.19623144800445, 52.27669159979153],
    [104.20226758467405, 52.28333712075397],
    [104.20786168941346, 52.2797760814776],
    [104.22089729456434, 52.28166229916805],
    [104.22790770028708, 52.283910880057626],
    [104.23522771363415, 52.29081038865494],
    [104.2407565268016, 52.2948499482811],
    [104.26638461677507, 52.29822838330568],
    [104.27308399775896, 52.29779539364029],
    [104.26100015849734, 52.29107999712741],
    [104.26127289591622, 52.288542424098125],
    [104.28621605735917, 52.25016628481171],
    [104.28519941200427, 52.24458675148984],
    [104.26641260276767, 52.23836553308716],
    [104.26578941093386, 52.24238450443071],
    [104.26718898448641, 52.24387179086638],
    [104.26321405378116, 52.24839187905746],
    [104.25439876157986, 52.25036701776253],
    [104.25329470900292, 52.24861981445831],
    [104.24917187827006, 52.249428004095016],
    [104.24609421585458, 52.24858132381089],
    [104.244686643807, 52.24893898905856],
    [104.2432275221029, 52.25007161672221],
    [104.23781304300405, 52.24915185371187],
    [104.2278703400527, 52.246115293089034],
    [104.21986206756546, 52.243059861346055],
    [104.2044276923238, 52.25231733957392],
    [104.19419309798846, 52.24732894979895],
    [104.17917100949722, 52.2573394757548]
];
let zone_800_coordinates = [
    [104.32964017251159, 52.326951026549885],
    [104.32766606667664, 52.313854696197005],
    [104.33745076516296, 52.31401250649392],
    [104.33848073342469, 52.30822575916489],
    [104.33976819375184, 52.29996517550311],
    [104.35796429970887, 52.30080708930649],
    [104.36005312180792, 52.27431279856156],
    [104.37515932297983, 52.2655192475782],
    [104.389537445447, 52.2550426368659],
    [104.37770220103603, 52.24627867020026],
    [104.36134460221223, 52.24556322133165],
    [104.34783073687593, 52.242949322148625],
    [104.33568312171482, 52.24698780059283],
    [104.31813375697918, 52.230332787298906],
    [104.33373272582179, 52.22066336065612],
    [104.32433605612933, 52.21278741596948],
    [104.31691170157612, 52.21178564545236],
    [104.3095302623671, 52.20593274285871],
    [104.291325574315, 52.212500697980566],
    [104.2921331373803, 52.20587059207157],
    [104.27278463320599, 52.20417962554995],
    [104.25997440295086, 52.20603847526892],
    [104.27602057678658, 52.224745576172154],
    [104.26014548386101, 52.23065940135263],
    [104.26666893995659, 52.23785478676432],
    [104.28651435085699, 52.244844877239764],
    [104.28753672571642, 52.250386694729606],
    [104.27431514302152, 52.27037260510123],
    [104.26558269973232, 52.28890399376182],
    [104.27215759980643, 52.29213855887275],
    [104.28732194024198, 52.29464995946081],
    [104.29256927937512, 52.30018580275272],
    [104.285654975478, 52.31360556033013],
    [104.28356739238346, 52.32279459984977],
    [104.29416193062222, 52.32795355842655],
    [104.32964017251159, 52.326951026549885]
]



</script>


<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>

@include('sections.cart-settings')
</body>
</html>
