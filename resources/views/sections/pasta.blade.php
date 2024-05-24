@if(count($Pasta)>0)
    <section class="cards" id="Pastas">
        <div class="container">
            <div class="head">
                <h2 class="h2 white" style="font-size: 32px;">Неаполитанская <br> пицца</h2>
            </div>
            <div class="row" style="justify-content: center;">
                <?
                $k=count($Pasta);
                if($k<3){$l=6;}
                if($k==3){$l=4;}
                if($k>=4){$l=3;}
                ?>
                @foreach($Pasta as $onePasta)
                        @if(!$onePasta->show_on_site)
                            @continue
                        @endif
                    <div data-id="{{$onePasta->product_id}}" class="col-lg-{{$l}} col-sm-6 productBlock" style="margin-bottom: 60px;">
                        <div class="card">
                            <div class="card__image">
                                <img class="productBlockImage" src="{{$onePasta->image}}" alt="alt">
                            </div>
                            <div class="card__content">
                                <div class="card__content-header">
                                    <div class="card__content-head productBlockTitle">{{$onePasta->title}}</div>
                                    <div class="card__content-price productBlockPrice">{{$onePasta->price}} р.</div>
                                </div>
                                <p>{{$onePasta->text}}</p>
                                <a href="#" class="btn btn--orange addCartButton">Добавить в корзину</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
