<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-2 order-2 order-md-1">
                <ul class="footer__list footer__list-mobile">
                    <li>
                        <a href="https://pitano.ru/">Главная</a>
                    </li>
                    <li>
                        <a href="https://pitano.ru/event">Акции</a>
                    </li>
                    <li>
                        <a href="https://pitano.ru/rest">Рестораны</a>
                    </li>
                    <li>
                        <a href="https://pitano.ru/contact">О компании</a>
                    </li>





{{--                    <li>--}}
{{--                        <a class="smoothScroll" href="#pinza">Пицца</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="smoothScroll" href="#salads">Салаты</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="smoothScroll" href="#soups">Супы</a>--}}
{{--                    </li>--}}
{{--					<li>--}}
{{--                        <a class="smoothScroll" href="#Pastas">Паста</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="smoothScroll" href="#desserts">Десерты</a>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <div class="col-md-3 order-3 order-md-2">
                <ul class="footer__list">
                    <li>
{{--                        <a class="btn-modal" href="#oferta" data-effect="mfp-zoom-out">Договор оферты</a>--}}
                        <a href="/oferta.pdf" target="_blank">Договор оферты</a>
                    </li>
                    <li>
{{--                        <a class="btn-modal" href="#agreement" data-effect="mfp-zoom-out">Обработка персональных данных</a>--}}
                        <a href="/policy.pdf" target="_blank">Обработка персональных данных</a>
                    </li>
                    <li>
                        <a  onclick="ym(55182217, 'reachGoal', 'telephone'); gtag('event','telephone', { 'event_category' : 'lead'});" href="tel:{{$Contacts->phone}}">{{$Contacts->phone}}</a>
                    </li>
                    <li>
                        <a class="btn-modal" href="#organization" data-effect="mfp-zoom-out">{{$Contacts->orgTitle}}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 order-1 order-md-3">
                <div class="logo logo--footer">
                    <img src="img/logo-footer.svg" alt="alt">
                </div>
            </div>
            <div class="col-md-4 order-4 order-md-4">
                <div class="footer-info">
                    <div class="footer-info__head">{{$MainSettings->footerText}}</div>
                    <div class="footer-info__count">
                        <span class="footer-info__count-text">Доставлено заказов:</span>
                        <span class="footer-info__count-num">{{$LastOrderId}} </span>
                    </div>
             <!--       <a href="{{$Contacts->instagramm}}" class="social" target="_blank">
                        <img src="img/instagram.svg" alt="alt">
                        <span>pizza.pitano</span>
                    </a>
             !-->       <div class="developer">
                        <a href="https://ai-design.site/" target="_blank">
                            <img src="img/ai.svg" alt="alt">
                            <span>2019</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
