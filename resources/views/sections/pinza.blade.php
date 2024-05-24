<section class="cards" id="pinza">
    <div class="container">
        <div class="head">
            <h2 class="h2 white" style="font-size: 32px;padding-bottom: 20px;">Римская пицца</h2>
        </div>
        <div class="card-main">
            <?$k=0;$l=0;?>
            @foreach($Pinza as $onePinza)
                @if($l==count($Pinza)-1)
                    </div>
                    <div class="card-main__row">
                        <div class="card-main__item card-main__item--top productBlock" data-id="{{$onePinza->product_id}}">
                            <div class="card-main__item-content">
                                <div class="card__content-header">
                                    <div class="card__content-head productBlockTitle">{{$onePinza->title}}</div>
                                    <div class="card__content-price productBlockPrice">{{$onePinza->price}} р.</div>
                                </div>
                                <p>{!! $onePinza->text !!}</p>
                                <a href="#" class="btn btn--orange addCartButton">Добавить в корзину</a>
                            </div>
                            <div class="card-main__item-image">
                                <?
                                if($onePinza->image2){
                                ?>
                                <img class="mobile productBlockImage" src="{{$onePinza->image1}}" alt="alt"
                                     @if ($onePinza->mobile_image && strlen($onePinza->mobile_image))
                                        data-mobile-img="{!! $onePinza->mobile_image !!}"
                                     @endif
                                >
                                <img class="desktop productBlockImage" src="{{$onePinza->image2}}" alt="alt"
                                     @if ($onePinza->mobile_image && strlen($onePinza->mobile_image))
                                        data-mobile-img="{!! $onePinza->mobile_image !!}"
                                     @endif
                                >
                                <?
                                }else{
                                ?>
                                <img class="productBlockImage" src="{{$onePinza->image1}}" alt="alt"
                                     @if ($onePinza->mobile_image && strlen($onePinza->mobile_image))
                                        data-mobile-img="{!! $onePinza->mobile_image !!}"
                                     @endif
                                >

                                <?
                                }
                                ?>
                                @if(strlen($onePinza->modal_image)>0)
                                    <img class="productBlockModalImage" src="{{$onePinza->modal_image}}" alt="alt" style="display: none">
                                @endif
                            </div>
                        </div>
                    </div>
                    @continue
                @endif
                @if($k==0)
                    <div class="card-main__row">
                        <div class="card-main__item card-main__item--top productBlock" data-id="{{$onePinza->product_id}}">
                            <div class="card-main__item-content">
                                <div class="card__content-header">
                                    <div class="card__content-head productBlockTitle">{{$onePinza->title}}</div>
                                    <div class="card__content-price productBlockPrice">{{$onePinza->price}} р.</div>
                                </div>
                                <p>{!! $onePinza->text !!}</p>
                                <a href="#" class="btn btn--orange addCartButton">Добавить в корзину</a>
                            </div>
                            <div class="card-main__item-image">
                                <?
                                    if($k==0 && $onePinza->image2){
                                ?>
                                    <img class="mobile productBlockImage" src="{{$onePinza->image1}}" alt="alt"
                                        @if ($onePinza->mobile_image && strlen($onePinza->mobile_image))
                                            data-mobile-img="{!! $onePinza->mobile_image !!}"
                                        @endif
                                    >
                                    <img class="desktop productBlockImage" src="{{$onePinza->image2}}" alt="alt"
                                         @if ($onePinza->mobile_image && strlen($onePinza->mobile_image))
                                            data-mobile-img="{!! $onePinza->mobile_image !!}"
                                         @endif
                                    >
                                <?
                                    }else{
                                ?>
                                    <img class="productBlockImage" src="{{$onePinza->image1}}" alt="alt"
                                         @if ($onePinza->mobile_image && strlen($onePinza->mobile_image))
                                            data-mobile-img="{!! $onePinza->mobile_image !!}"
                                         @endif
                                    >

                                <?
                                    }
                                ?>
                                @if(strlen($onePinza->modal_image)>0)
                                    <img class="productBlockModalImage" src="{{$onePinza->modal_image}}" alt="alt" style="display: none">
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    @if($k==1)
                    <div class="card-main__row">
                        <div class="card-main__item card-main__item--left productBlock" data-id="{{$onePinza->product_id}}">
                            <div class="card-main__item-content">
                                <div class="card__content-header">
                                    <div class="card__content-head productBlockTitle">{{$onePinza->title}}</div>
                                    <div class="card__content-price productBlockPrice">{{$onePinza->price}} р.</div>
                                </div>
                                <p>{!! $onePinza->text !!}</p>
                                <a href="#" class="btn btn--orange addCartButton">Добавить в корзину</a>
                            </div>
                            <div class="card-main__item-image image-230">
                                <img class="productBlockImage" src="{{$onePinza->image1}}" alt="alt"
                                     @if ($onePinza->mobile_image && strlen($onePinza->mobile_image))
                                        data-mobile-img="{!! $onePinza->mobile_image !!}"
                                     @endif
                                >
                                @if(strlen($onePinza->modal_image)>0)
                                    <img class="productBlockModalImage" src="{{$onePinza->modal_image}}" alt="alt" style="display: none;">
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="card-main__item card-main__item--right productBlock" data-id="{{$onePinza->product_id}}">
                            <div class="card-main__item-image image-230">
                                <img class="productBlockImage" src="{{$onePinza->image1}}" alt="alt"
                                    @if ($onePinza->mobile_image && strlen($onePinza->mobile_image))
                                        data-mobile-img="{!! $onePinza->mobile_image !!}"
                                    @endif
                                >
                                @if(strlen($onePinza->modal_image)>0)
                                    <img class="productBlockModalImage" src="{{$onePinza->modal_image}}" alt="alt" style="display: none;">
                                @endif
                            </div>
                            <div class="card-main__item-content">
                                <div class="card__content-header">
                                    <div class="card__content-price productBlockPrice">{{$onePinza->price}} р.</div>
                                    <div class="card__content-head productBlockTitle">{{$onePinza->title}}</div>
                                </div>
                                <p>{!! $onePinza->text !!}</p>
                                <a href="#" class="btn btn--orange addCartButton">Добавить в корзину</a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endif
                <?$k++;if($k==3){$k=1;}$l++;?>
            @endforeach
{{--            <div class="card-main__row">--}}
{{--                <div class="card-main__item card-main__item--left">--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-head">Ветчина с грибами</div>--}}
{{--                            <div class="card__content-price">550 р.</div>--}}
{{--                        </div>--}}
{{--                        <p>Томаты потертые, ветчина, белые грибы, артишок, моцарелла.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-2.png" alt="alt">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-main__item card-main__item--right">--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-3.png" alt="alt">--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-price">490 р.</div>--}}
{{--                            <div class="card__content-head">Пепперони с руккулой</div>--}}
{{--                        </div>--}}
{{--                        <p>Томаты потертые, острая салями, моцарелла, руккола, оливки.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-main__row">--}}
{{--                <div class="card-main__item card-main__item--left">--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-head">ВЕГЕТаРИАНСКАЯ</div>--}}
{{--                            <div class="card__content-price">480 р.</div>--}}
{{--                        </div>--}}
{{--                        <p>Томаты потертые, печаные овощи, лесные грибы, моцарелла, артишок, оливки каламата.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-4.png" alt="alt">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-main__item card-main__item--right">--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-5.png" alt="alt">--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-price">460 р.</div>--}}
{{--                            <div class="card__content-head">кватро формаджио</div>--}}
{{--                        </div>--}}
{{--                        <p>Соус сливочный, моцарелла, пармезан, сулугуни, горгонзола.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-main__row">--}}
{{--                <div class="card-main__item card-main__item--left">--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-head">тунец с беконом и красным луком</div>--}}
{{--                            <div class="card__content-price">580 р.</div>--}}
{{--                        </div>--}}
{{--                        <p>Томаты потертые, тунец, бекон, моцарелла, артишок, каперсы, маслины каламата, красный лук.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-6.png" alt="alt">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-main__item card-main__item--right">--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-7.png" alt="alt">--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-price">560 р.</div>--}}
{{--                            <div class="card__content-head">с пармским окороком</div>--}}
{{--                        </div>--}}
{{--                        <p>Томаты потертые, пармский окорок, черри, моцарелла, руккола.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-main__row">--}}
{{--                <div class="card-main__item card-main__item--left">--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-head">груша фламбе с горгонзолой</div>--}}
{{--                            <div class="card__content-price">600 р.</div>--}}
{{--                        </div>--}}
{{--                        <p>Груша фламбированная, горгонзола, соус маскарпоне, орех кедровый, мята.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-8.png" alt="alt">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-main__item card-main__item--right">--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-9.png" alt="alt">--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-price">700 р.</div>--}}
{{--                            <div class="card__content-head">семга с креветками</div>--}}
{{--                        </div>--}}
{{--                        <p>Соус сливочный, семга с/с, томаты черри, моцарелла, цедра лимона, крем-сыр.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-main__row">--}}
{{--                <div class="card-main__item card-main__item--left">--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-head">с анчоусом и сыром страчателла</div>--}}
{{--                            <div class="card__content-price">600 р.</div>--}}
{{--                        </div>--}}
{{--                        <p>Соус сливочно – томатный, анчоусы, томаты вяленые, руккола, страчателла, бальзамический крем.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-10.png" alt="alt">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-main__item card-main__item--right">--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-11.png" alt="alt">--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-price">550 р.</div>--}}
{{--                            <div class="card__content-head">пармеджано</div>--}}
{{--                        </div>--}}
{{--                        <p>Томаты потертые, баклажан запеченый, пармезан, томаты, соус песто, моцарелла, базилик.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-main__row">--}}
{{--                <div class="card-main__item card-main__item--left">--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-head">мясная</div>--}}
{{--                            <div class="card__content-price">560 р.</div>--}}
{{--                        </div>--}}
{{--                        <p>Томаты потертые, моцарелла, орегано, оливковое масло, базилик.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-12.png" alt="alt" class="desktop">--}}
{{--                        <img src="img/pizza-mobile-2.png" alt="alt" class="mobile">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-main__item card-main__item--right">--}}
{{--                    <div class="card-main__item-image">--}}
{{--                        <img src="img/pizza-13.png" alt="alt" class="desktop">--}}
{{--                        <img src="img/pizza-mobile-3.png" alt="alt" class="mobile">--}}
{{--                    </div>--}}
{{--                    <div class="card-main__item-content">--}}
{{--                        <div class="card__content-header">--}}
{{--                            <div class="card__content-price">550 р.</div>--}}
{{--                            <div class="card__content-head">индейка с яблоком</div>--}}
{{--                        </div>--}}
{{--                        <p>Соус маскарпоне, рулет из индейки, базелик,   яблоко карамелизированное с корицей, пармезан.</p>--}}
{{--                        <a href="#" class="btn btn--orange">В корзину</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

    <script>
        function setMobileImagesForPinza() {
            let w = parseInt(window.innerWidth);
            console.log(w);
            if (w < 765) {
                document.querySelectorAll("#pinza img[data-mobile-img]").forEach(function(img){
                    let new_img = img.getAttribute('data-mobile-img');
                    if (new_img && new_img.length > 0) {
                        img.src = new_img;
                    }

                });
            }
        }

        setMobileImagesForPinza();

    </script>
</section>
