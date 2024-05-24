<nav class="main-nav mobile">
    <ul class="main-text-list">
        <div class="main_menu_row">
            <li class="col-4"><a href="https://pitano.ru/">Главная</a></li>
            <li class="col-4"><a href="https://pitano.ru/event">Акции</a></li>
            <li class="col-4"><a href="https://pitano.ru/rest">Рестораны</a></li>
        </div>
        <div class="main_menu_row" style="text-align: left; padding-left: 5px;">
            <li class="col-4" style=" padding-right: 0;"><a href="https://pitano.ru/bonus" >Карта гостя</a></li>
            <li class="col-4" style=" padding-right: 0;"><a href="https://pitano.ru/contact">О компании</a></li>
        </div>
    </ul>
    {{--        Кнопки:--}}
    <ul class="main-list">
        <div class="main_menu_row">
            <li class="col-4"><a href="#pinza">Пицца</a></li>
            <li class="col-4"><a href="#salads">Салаты</a></li>
            <li class="col-4"><a href="#desserts">Десерты</a></li>
{{--            <li class="col-4"><a href="#soups">Супы</a></li>--}}
{{--            <li class="col-4"><a href="#soups">Напитки</a></li>--}}
        </div>

        <div class="main_menu_row">
            <li class="col-4"><a class="btn-modal" href="#delivery" data-effect="mfp-zoom-out">Доставка</a></li>
        </div>

    </ul>
    {{--        /кнопки--}}
    <div class="mobile-menu">
        <div class="mobile-menu__top">
            <div class="header-contacts">
                <a href="tel:+{{$Contacts->phone}}" onclick="ym(55182217, 'reachGoal', 'telephone'); ga ('send', 'event', 'lead', 'telephone'); return true;" class="header-contacts__phone linked">{{$Contacts->phone}}</a>
                <div class="header-contacts__address">{{$Contacts->adress}}</div>
            </div>
        </div>
        <div class="mobile-menu__bottom">
{{--            <div class="footer-info__head">{{$MainSettings->footerText}}</div>--}}
            <div class="main_menu_row">
                <a href="{{$Contacts->instagramm}}" class="social" target="_blank">
                    <img src="img/instagram-black.svg" alt="alt">
                    <span>pizza.pitano</span>
                </a>
                <a href="{{$Contacts->instagramm}}" class="social" target="_blank">
                    <img src="img/instagram-black.svg" alt="alt">
                    <span>pizzapotano.napoli</span>
                </a>
            </div>

        </div>
    </div>
</nav>

{{--Скрипт включает мобильную менюху:--}}
<script>
    // window.addEventListener('load',function(){$('.hamburger.hamburger--vortex').click()});
</script>
<style>
    .mobile-menu .mobile-menu__bottom{
        padding-top: 30px;
    }
    .mobile-menu__bottom .main_menu_row a img{
        margin-right: 5px;
        width: 22px;
    }
    .mobile-menu__bottom .main_menu_row a span{
        font-weight: 600;
        font-size: 15px;
    }
    .mobile-menu__bottom .main_menu_row a{
        width: 50%;
        text-align: left;
        justify-content: flex-start;
    }

    .main-nav.mobile{
        flex-direction: column;
        padding-top: 10px;
    }


    .main-nav.mobile .main-text-list li{
        padding-right: 10%;
    }
    .main-nav.mobile .main-list li a{
        font-weight: 600;
    }
    .main-nav.mobile .main-list{
        padding-top: 30px;
    }
    .main-text-list{
        display: flex;
        flex-direction: column;
    }
    .main_menu_row li{
        padding: 0;
    }
    .main_menu_row a{
        font-weight: 600;
    }
    .main_menu_row{
        display: inline-flex;
        padding-bottom: 20px;
        text-align: center;
        width: 100%;
    }

    @media only screen and (max-width: 992px) {
        .main-list li + li {
            margin-top: 0;
        }
    }


    .mobile-menu__top .header-contacts .header-contacts__address{
        margin-top: 0;
        font-weight: 600;
        width: 50%;
    }
    .mobile-menu__top .header-contacts{
        display: flex!important;
        text-align: left;
    }
    .mobile-menu__top .header-contacts a{
        width: 50%;
        font-size: initial;
        padding-top: 10px;
    }

    .mobile-menu .mobile-menu__top{
        padding-top: 20px;
    }


</style>
