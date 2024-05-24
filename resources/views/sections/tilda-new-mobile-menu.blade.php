<nav class="main-nav mobile">
    <div class="main_menu_row">
        <div class="main_menu_row_inner">
            <ul>
                @if($MainSettings["model_show_on_site"]->Sets->show)
                    <li><a href="#sets">Наборы</a></li>
                @endif
                @if($MainSettings["model_show_on_site"]->Pasta->show)
                    <li><a href="#Pastas">Неаполитанская пицца</a></li>
                @endif
                @if($MainSettings["model_show_on_site"]->Pinza->show)
                    <li><a href="#pinza">Римская пицца</a></li>
                @endif
                @if($MainSettings["model_show_on_site"]->Salat->show)
                    <li><a href="#salads">Салаты</a></li>
                @endif
                @if($MainSettings["model_show_on_site"]->Dessert->show)
                    <li><a href="#desserts">Десерты</a></li>
                @endif
                @if($MainSettings["model_show_on_site"]->Hot->show)
                    <li><a href="#hot">Горячее</a></li>
                @endif
                @if($MainSettings["model_show_on_site"]->Makaron->show)
                    <li><a href="#makaron">Паста</a></li>
                @endif
                @if($MainSettings["model_show_on_site"]->Soup->show)
                    <li><a href="#soups">Супы</a></li>
                @endif

                <li>
                    <a href="#delivery" class="btn-modal" data-effect="mfp-zoom-out">Условия доставки</a>
                </li>
            </ul>
{{--            <ul>--}}
{{--                <li>--}}
{{--                    <a href="#pinza">Пицца</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#salads">Салаты</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#" disabled>Напитки</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#desserts">Десерты</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="https://pitano.ru/rest">Рестораны</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a class="btn-modal btn btn--orange" href="#delivery" data-effect="mfp-zoom-out">Доставка</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div>
    </div>

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
<style>
    .mobile-menu__top{width: 50%;padding-left: 2%;}
    .mobile-menu__bottom{width: 50%}
    .mobile-menu .mobile-menu__top .header-contacts{
        text-align: left;
    }
    .mobile-menu .mobile-menu__bottom{
        /*padding-top: 30px;*/
    }
    .mobile-menu__bottom .main_menu_row a img{
        margin-right: 5px;
        width: 16px;
    }
    .mobile-menu__bottom .main_menu_row a span{
        font-weight: 600;
        font-size: 13px;
    }
    .mobile-menu__bottom .main_menu_row a+a{
        margin-top: 12px;
    }
    .mobile-menu__bottom .main_menu_row a{
        /*width: 50%;*/
        text-align: left;
        justify-content: flex-start;
        width: 100%;
        margin-bottom: 0;
        margin-top: 0;
    }

    .main-nav.mobile{
        flex-direction: column;
        padding-top: 10px;
    }
    .main_menu_row_inner{
        width: 100%;
        display: flex;
    }
    .main_menu_row_inner ul a{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 22px;
    }
    .main_menu_row_inner ul {
        width: 100%;
    }
    .main_menu_row_inner ul+ul {
        padding-left: 3%;
    }

    .main_menu_row_inner li {
        padding-top: 8px;
        padding-bottom: 7px;
    }

    .main-nav.mobile .mobile-menu{
        flex-direction: row-reverse;
        justify-content: inherit;
    }
    @media only screen and (max-width: 1200px){
        .main-list a {
            font-size: 16px;
        }
    }
</style>
