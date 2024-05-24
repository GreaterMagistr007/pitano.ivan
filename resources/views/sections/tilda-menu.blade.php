<div class="tilda_menu">
    <div class="tilda_menu--logo">
        <a href="https://pitano.ru">
{{--            <strong>Pizza</strong>Pitano--}}
{{--            <img src="/img/logo1.svg" alt="" style="width: 130px;height: auto">--}}
        </a>
    </div>
    <nav class="main-nav desktop">
        <ul class="tilda_menu--main-list main-list">
            @if($MainSettings["model_show_on_site"]->Sets->show)
                <li><a href="#sets">Наборы</a></li>
            @endif
            @if($MainSettings["model_show_on_site"]->Pasta->show)
                <li><a href="#Pastas">Неаполитанская пицца</a></li>
            @endif
            @if($MainSettings["model_show_on_site"]->Pinza->show)
                <li><a href="#pinza">Римская пицца</a></li>
            @endif
{{--            Старый вариант--}}
{{--            <li><a href="https://pitano.ru/">Главная</a></li>--}}
{{--            <li><a class="btn-modal" href="#delivery" data-effect="mfp-zoom-out">Доставка</a></li>--}}
{{--            <li><a href="https://pitano.ru/rest">Рестораны</a></li>--}}
{{--            <li><a href="https://pitano.ru/event">Акции</a></li>--}}
{{--            <li><a href="https://pitano.ru/bonus">Клубная карта</a></li>--}}
{{--            <li><a href="https://pitano.ru/contact">Контакты</a></li>--}}



{{--            <li><a href="https://www.instagram.com/pizza.pitano/"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" xml:space="preserve"> <desc>Instagram</desc> <path d="M15,11.014 C12.801,11.014 11.015,12.797 11.015,15 C11.015,17.202 12.802,18.987 15,18.987 C17.199,18.987 18.987,17.202 18.987,15 C18.987,12.797 17.199,11.014 15,11.014 L15,11.014 Z M15,17.606 C13.556,17.606 12.393,16.439 12.393,15 C12.393,13.561 13.556,12.394 15,12.394 C16.429,12.394 17.607,13.561 17.607,15 C17.607,16.439 16.444,17.606 15,17.606 L15,17.606 Z"></path> <path d="M19.385,9.556 C18.872,9.556 18.465,9.964 18.465,10.477 C18.465,10.989 18.872,11.396 19.385,11.396 C19.898,11.396 20.306,10.989 20.306,10.477 C20.306,9.964 19.897,9.556 19.385,9.556 L19.385,9.556 Z"></path> <path d="M15.002,0.15 C6.798,0.15 0.149,6.797 0.149,15 C0.149,23.201 6.798,29.85 15.002,29.85 C23.201,29.85 29.852,23.202 29.852,15 C29.852,6.797 23.201,0.15 15.002,0.15 L15.002,0.15 Z M22.666,18.265 C22.666,20.688 20.687,22.666 18.25,22.666 L11.75,22.666 C9.312,22.666 7.333,20.687 7.333,18.28 L7.333,11.734 C7.333,9.312 9.311,7.334 11.75,7.334 L18.25,7.334 C20.688,7.334 22.666,9.312 22.666,11.734 L22.666,18.265 L22.666,18.265 Z"></path> </svg></a></li>--}}
        </ul>
    </nav>

    <div class="header-contacts">
        {{--                <div class="header-contacts__address">{{$Contacts->adress}}</div>--}}
        <a href="tel:{{$Contacts->phone}}" onclick="ym(55182217, 'reachGoal', 'telephone'); gtag('event','telephone', { 'event_category' : 'lead'});" class="header-contacts__phone linked">{{$Contacts->phone}}</a>
    </div>
</div>

<style>
    .tilda_menu{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;

        font-family: 'Open Sans',Arial,sans-serif;

        /*background-color: rgba(248,248,248,1);*/
    }

    .tilda_menu--logo{
        /*Для текста*/
        display: inline-block;
        font-size: 24px;
        font-weight: 400;
        white-space: nowrap;
        padding-right: 30px;

        /*Для картинки*/
    }


    .tilda_menu--main-list{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .tilda_menu--main-list li + li {
        margin-left: 55px;
    }

    .tilda_menu--main-list a {
        display: inline-block;
        position: relative;
        font-size: 18px;
        color: #000;
        font-weight: 500;

        /*font-size: 16px;*/
        /*font-weight: 700;*/
        font-family: 'Open Sans';
    }

    .tilda_menu--main-list a::before {
        height: 1px;
        width: 100%;
        background-color: #000;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-transition: all .35s ease;
        -o-transition: all .35s ease;
        transition: all .35s ease;
        bottom: -2px;
        left: 0;
    }
    a::before {
        content: '';
        position: absolute;
    }

    .main-nav {
        /*top: 94px!important;*/
    }
    .header-row .logo.logo--header img{
        display: none;
    }

    nav.main-nav.desktop a{
        font-weight: 500;
        font-family: 'Open Sans';
    }

    @media only screen and (min-width: 993px){
        .tilda_menu--logo{
            width: 21%;
        }
        .logo.logo--header{
            width: 210px;
            /*height: 20px;*/
            /*background: red;*/
        }
        .tilda_menu nav{width: 80%}
        .tilda_menu--main-list{
            /*width: 700px;*/
            justify-content: space-between;
        }
        .header-row .main-nav.desktop .main-list{
            width: 100%;
            justify-content: space-between;
        }
        .header-row .main-nav.desktop{
            width: 607px;
        }
    }


    @media only screen and (max-width: 1200px){
        .tilda_menu--main-list li + li {
            margin-left: 30px;
        }
    }

    @media only screen and (max-width: 992px){
        .tilda_menu{display: none;}
    }
</style>
