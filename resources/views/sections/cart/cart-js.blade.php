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




    document.querySelector('.closeCart').addEventListener('click',function(el){
        hideCart();
    });

    //отловим событие нажатия клавиши на инпуте. Надо исключить "8"
    function checkFirstChar8(key,elem){
        if(key=='8' && elem.value.length==0){
            elem.value = '+7 (';
            return false;
        }
    }

    document.querySelectorAll('.delivery_checkbox').forEach(function(elem){
        elem.addEventListener('click',function(){
            document.querySelectorAll('.delivery_checkbox.active').forEach(function(el){el.classList.remove('active')});
            this.classList.add('active');
            document.querySelector('input#pickup_place').value = this.getAttribute('value');
        });
    });

    function setActivePaymentMethod(payment_choose_div){
        console.log(event);
        document.querySelectorAll('.payment .payment-row .payment-choose input').forEach(function(elem){
            elem.removeAttribute('checked');
        });
        console.log(payment_choose_div);
        payment_choose_div.querySelector('input').setAttribute('checked',true);
    }





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
        minDeliverySum = 800;
        if(!error){
            var address_input = document.querySelector('.order .address_input');
            if(address_input && address_input.hasAttribute('required') && address_input.value.length<5){
                error = 'Пожалуйста, введите корректный адрес доставки';
            }
            minDeliverySum = $('.successCart').attr('data-minDeliverySum');
            // console.log(parseInt(minDeliverySum));
            // console.log(summCart());
            // console.log(parseInt(minDeliverySum)<parseInt(summCart()));

            minDeliverySum = 900;
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


    if(window.innerWidth<600){document.querySelector('.cart-content').style.overflowY='scroll';}
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

        console.log('перерисовка корзины');
        console.log(cart);

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
        $('.productBlock .card__image img').on('click',function(){productClick(event.target);});
        $('.productBlock .card__content .card__content-header').on('click',function(){productClick(event.target);});
        $('.productBlock .card__content p').on('click',function(){productClick(event.target);});

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
        ///метрика
        addToCart(getNeedleSelectorOfThisElAndParent(this,'.productBlock',7));
    });
    $( document ).ready(function() {
        repaintCart();
    });
</script>
