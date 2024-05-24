@if(count($Sets)>0)
    <section class="cards" id="sets">
        <div class="container">
            <div class="head">
                <h2 class="h2 white">Наборы</h2>
            </div>
            <div class="row" style="justify-content: center;">
                <?
                $k=count($Sets);
                if($k<3){$l=6;}
                if($k==3){$l=4;}
                if($k>=4){$l=3;}
                ?>
                @foreach($Sets as $oneSet)
                        @if(!$oneSet->show_on_site)
                            @continue
                        @endif
                    <div data-id="{{$oneSet->product_id}}" class="col-lg-{{$l}} col-sm-6 productBlock" style="margin-bottom: 60px;">
                        <div class="card">
                            <div class="card__image">
                                <img class="productBlockImage" src="{{$oneSet->image}}" alt="alt">
                                @if(count($oneSet->images))
                                    @foreach($oneSet->images as $img)
                                        <img src="/{{$img}}" alt="alt" class="set_display_block" style="display: none;">
                                    @endforeach
                                @endif
                            </div>
                            @if(count($oneSet->images))
                                @foreach($oneSet->images as $img)
                                    <span class="card__slider_images" data_slider_image="/{{$img}}"></span>
                                @endforeach
                            @endif
                            <div class="card__content">
                                <div class="card__content-header">
                                    <div class="card__content-head productBlockTitle">{{$oneSet->title}}</div>
                                    <div class="card__content-price productBlockPrice">{{$oneSet->price}} р.</div>
                                </div>
                                <p>{{$oneSet->text}}</p>
                                <a href="#" class="btn btn--orange addCartButton">Добавить в корзину</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <style>
            .card__slider_images{
                display: none!important;
            }

            #sets .slick-list{
                padding-bottom: 0!important;
            }
        </style>
        <script>
            window.addEventListener('load',function(){
                $('#sets .productBlock .card .card__image').slick({
                    rows: false,
                    arrows: true,
                    accessibility: true,
                    autoplay: false,
                    autoplaySpeed: 5000,
                    speed: 1000,
                    pauseOnHover: false,

                });
                // $('.slick-prev.slick-arrow').html('<-');
                // $('.slick-next.slick-arrow').html('->');
                $('.slick-prev.slick-arrow').html('');
                $('.slick-next.slick-arrow').html('');
            });

            // document.querySelectorAll(".slick-arrow").forEach(function(el){el.innerHTML="";});
        </script>

        <style>
            .slick-arrow{
                width: 16px;
                height: 16px;
                background-image: url(/img/arrow-right.svg);
                background-repeat: no-repeat;
                /* background-size: contain; */
                background-color: white;
                padding: 16px;
                border-radius: 50%;
                background-position: center;
                bottom: 45%;
                position: absolute;
                z-index: 100;
                opacity: 0.5;
            }
            .slick-next.slick-arrow{
                right: 0;
            }
            .slick-prev.slick-arrow{
                transform: rotate(180deg);
            }
        </style>
    </section>
@endif
