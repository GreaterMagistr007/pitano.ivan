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

            @include('sections.cart.header-card-button')

        </div>
    </div>
    @include('sections.cart.header-cart-form')
</header>
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


