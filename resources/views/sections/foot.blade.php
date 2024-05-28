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







@include('sections.cart.cart-js')







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

@include('sections.cart.cart-js-class')
</body>
</html>
