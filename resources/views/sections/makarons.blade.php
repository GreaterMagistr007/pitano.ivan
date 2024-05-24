@if(count($Makaron)>0)
    <section class="cards" id="makaron">
        <div class="container">
            <div class="head">
                <h2 class="h2 white" style="font-size: 32px;">Паста</h2>
            </div>
            <div class="row" style="justify-content: center;">
                <?
                $k=count($Makaron);
                if($k<3){$l=6;}
                if($k==3){$l=4;}
                if($k>=4){$l=3;}
                ?>
                @foreach($Makaron as $oneMakaron)
                        @if(!$oneMakaron->show_on_site)
                            @continue
                        @endif
                    <div data-id="{{$oneMakaron->product_id}}" class="col-lg-{{$l}} col-sm-6 productBlock" style="margin-bottom: 60px;">
                        <div class="card">
                            <div class="card__image">
                                <img class="productBlockImage" src="{{$oneMakaron->image}}" alt="alt">
                            </div>
                            <div class="card__content">
                                <div class="card__content-header">
                                    <div class="card__content-head productBlockTitle">{{$oneMakaron->title}}</div>
                                    <div class="card__content-price productBlockPrice">{{$oneMakaron->price}} р.</div>
                                </div>
                                <p>{{$oneMakaron->text}}</p>
                                <a href="#" class="btn btn--orange addCartButton">Добавить в корзину</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
